<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Lembaga;
use App\Models\Donatur;
use App\Models\Relasi;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\PenerimaanExport;
use App\Exports\ProgramExport;
use App\Exports\TanggalExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Rekening;
use App\Models\Program;
use Illuminate\Support\Facades\File;

class PenerimaanController extends Controller
{
    public $new_penerimaan;
    public function __construct()
    {
        $this->new_penerimaan = new Penerimaan();
    }

    public function index()
    {
        // menghitung total data
        $jumlah = Penerimaan::count();

        // buat paginition
        $batas = 8;

        // Tangkap request nama
        $tangkap = request()->cari;

        $data = Penerimaan::with([
            'user',
            'program',
            'campaign',
            'grup',
            'lembaga',
            'rekening',
            'donatur'
        ])->whereRelation('program', 'nama', 'LIKE', "%$tangkap%")
            ->orWhereRelation('donatur', 'nama', 'LIKE', "%$tangkap%")
            ->orWhereRelation('user', 'nama', 'LIKE', "%$tangkap%")
            ->orderBy('id', 'DESC')->simplePaginate($batas);


        // urutkan nomor sesuai total data
        $no = $batas * ($data->currentPage() - 1);

        $program = Program::orderBy('id', 'DESC')->get();

        $tgl = Penerimaan::orderBy('created_at', 'DESC')->get();


        return view('penerimaan.index', [
            'penerimaan' => $data, 'total' => $jumlah, 'no' => $no, 'program' => $program, 'tgl' => $tgl
        ]);
    }


    public function penerimaanByDonatur()
    {
        // menghitung total data
        $jumlah = Donatur::count();

        // buat paginition
        $batas = 10;

        // Tangkap request nama
        $tangkap = request()->cari;

        $data  = Penerimaan::join('donatur', 'penerimaan.donatur_id', 'donatur.id')
            ->selectRaw("sum(penerimaan.jumlah) as jumlah ,donatur.nama as donatur, donatur.id as id")
            ->WhereRelation('donatur', 'nama', 'LIKE', "%$tangkap%")
            // ->Where('donatur.id', '=', 7)
            ->orderBy('donatur.id', 'desc')
            ->groupBy('donatur', 'id')->simplePaginate($batas);

        // urutkan nomor sesuai total data
        $no = $batas * ($data->currentPage() - 1);
        return view('penerimaan.byDonatur', [
            'totalByDonatur' => $data, 'total' => $jumlah, 'no' => $no
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relawan  = User::where('role', 'relawan')->get();
        $lembaga = Lembaga::orderBy('id', 'DESC')->get();
        $donatur = Donatur::orderBy('id', 'DESC')->get();
        $relasi = Relasi::orderBy('id', 'DESC')->get();
        $rekening = Rekening::orderBy('id', 'DESC')->get();
        $program = Program::orderBy('id', 'DESC')->get();
        return view('penerimaan.create', [
            'relawan' => $relawan, 'lembaga' => $lembaga, 'donatur' => $lembaga, 
            'relasi' => $relasi, 'rekening' => $rekening, 'program' => $program
        ]);
        // return view('penerimaan.create', compact('relawan', 'lembaga', 'donatur', 'relasi', 'rekening', 'program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'bukti' => "mimes:png,jpg,jpeg|",
            'reff' => "required",
            'tgl' => "required",
            'relawan' => "required",
            'nominal' => "required",
            'relasi' => "required",
            'nama_bs' => "required",
            'program' => "required",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg, dan .jpeg"
        ];

        $this->validate($request, $rules, $messages);

        $bukti    = 'NULL';

        if ($request->file('bukti')) {
            $bukti = $request->file('bukti')->store('bukti_transfer');
        }

        $this->new_penerimaan->reff = $request->reff;
        $this->new_penerimaan->tgl = $request->tgl;
        $this->new_penerimaan->tgl_tf = $request->tgl_tf;
        $this->new_penerimaan->users_id = $request->relawan;
        $this->new_penerimaan->prog_penerimaan_id = $request->program;
        $this->new_penerimaan->grup_id = User::where('id', $request->relawan)->first()->grup_id;
        $this->new_penerimaan->lembaga_id = $request->lembaga;
        $this->new_penerimaan->rekening_id = $request->rekening;
        $this->new_penerimaan->donatur_id = $request->donatur;
        $this->new_penerimaan->relasi_id =  $request->relasi;
        $this->new_penerimaan->nominal =  $request->nominal;
        $this->new_penerimaan->jumlah =  $request->nominal;
        $this->new_penerimaan->nama_bs =  $request->nama_bs;
        $this->new_penerimaan->bukti = $bukti;
        $this->new_penerimaan->person_at = $request->person_at;

        // dd($request->bukti);

        $this->new_penerimaan->save();
        return redirect()->route('penerimaan')->with('status', 'Penerimaan successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penerimaan = Penerimaan::find($id);

        $relawan = User::orderBy('id', 'DESC')->where('role', 'relawan')->get();
        $lembaga = Lembaga::orderBy('id', 'DESC')->get();
        $donatur = Donatur::all();
        $relasi = Relasi::orderBy('id', 'DESC')->get();
        $rekening = Rekening::orderBy('id', 'DESC')->get();
        $program = Program::orderBy('id', 'DESC')->get();

        return view('penerimaan.edit', [
            'penerimaan' => $penerimaan, 'relawan' => $relawan, 'lembaga' => $lembaga, 'donatur' => $donatur,
            'relasi' => $relasi, 'rekening' => $rekening, 'program' => $program
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penerimaan_edit = Penerimaan::find($id);
        $penerimaan_edit->reff = $request->reff;
        $penerimaan_edit->tgl = $request->tgl;
        $penerimaan_edit->tgl_tf = $request->tgl_tf;
        $penerimaan_edit->users_id = $request->relawan;
        $penerimaan_edit->prog_penerimaan_id = $request->program;
        $penerimaan_edit->grup_id = User::where('id', $request->relawan)->first()->grup_id;
        $penerimaan_edit->lembaga_id = $request->lembaga;
        $penerimaan_edit->rekening_id = $request->rekening;
        $penerimaan_edit->donatur_id = $request->donatur;
        $penerimaan_edit->relasi_id =  $request->relasi;
        $penerimaan_edit->nominal =  $request->nominal;
        $penerimaan_edit->jumlah =  $request->nominal;
        $penerimaan_edit->nama_bs =  $request->nama_bs;
        $penerimaan_edit->person_at =  $request->person_at;
        // $penerimaan_edit->bukti = $bukti;
        $gambarLama = $penerimaan_edit->bukti;

        if (!$request->bukti) {
            $penerimaan_edit->bukti = $gambarLama;
        } else {
            if ($request->bukti != $gambarLama) {
                $bukti    = 'NULL';

                if ($request->file('bukti')) {
                    $bukti = $request->file('bukti')->store('bukti_transfer');
                }
                $penerimaan_edit->bukti = $bukti;
            } else {
                $request->bukti->move(public_path() . '/storage', $gambarLama);
            }
        }

        $penerimaan_edit->save();
        return redirect()->route('penerimaan')->with('status', 'Penerimaan successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $penerimaan_hapus = Penerimaan::findOrFail($id);

        // $penerimaan_hapus->delete();
        $penerimaan_hapus = Penerimaan::findOrFail($id);
        $bukti = "storage/" . $penerimaan_hapus->bukti;

        if (File::exists($bukti)) {
            File::delete($bukti);
        }


        $penerimaan_hapus->delete();
        return redirect()->route('penerimaan')->with('status', 'Penerimaan successfully deleted');
    }

    public function printSertifikat($id)
    {
        $dt = Carbon::now();
        $today = $dt->toDateString();
        $penerimaan = Penerimaan::where('id', $id)->first();
        $lembaga = Lembaga::where('id', $penerimaan->lembaga_id)->first();
        $donatur = Donatur::where('id', $penerimaan->donatur_id)->first();

        if ($prog_penerimaan = Program::where('id', $penerimaan->prog_penerimaan_id)->where('nama', 'like', 'Wakaf%')->first()) {
            $pdf = PDF::loadView('penerimaan.print-sertifikat', compact('today', 'prog_penerimaan', 'donatur', 'penerimaan', 'lembaga'));
            return $pdf->stream();
        } else {
            return redirect('/penerimaan');
        }
    }

    public function printTransaksi($id)
    {
        $penerimaan = Penerimaan::with([
            'program',
            'donatur'
        ])
            ->Where('penerimaan.donatur_id', $id)
            ->orderBy('penerimaan.id', 'DESC')->first();

        
          $data  = Penerimaan::join('donatur', 'penerimaan.donatur_id', 'donatur.id')
            ->selectRaw("sum(penerimaan.jumlah) as jumlah ,donatur.nama as donatur, donatur.id as id")
            ->Where('penerimaan.donatur_id', $id)
            ->orderBy('donatur.id', 'desc')
            ->groupBy('donatur', 'id')->first();
      
         $penerimaanf  = Penerimaan::join('donatur', 'penerimaan.donatur_id', 'donatur.id')
            ->join('prog_penerimaan', 'penerimaan.prog_penerimaan_id', 'prog_penerimaan.id')
            ->selectRaw("sum(penerimaan.jumlah) as total ,donatur.nama as donatur, donatur.id as id, penerimaan.tgl_tf as tgl_tf, prog_penerimaan.nama as program, penerimaan.nominal as nominal, penerimaan.reff as reff")
            ->Where('penerimaan.donatur_id', $id)
            ->groupBy('donatur', 'id', 'tgl_tf', 'nominal', 'program', 'reff')->get();

            // {{--Tanda Pekerjaan--}}
             
        // dd($penerimaand[0]);
        // dd($penerimaanf);
        $pdf = PDF::loadView('penerimaan.repot-ziswaf', compact('penerimaan', 'penerimaanf', 'data'));
        return $pdf->stream();
    }

    public function printKwitansi($id)
    {
        $dt = Carbon::now();
        $today = $dt->toDateString();
        $penerimaan = Penerimaan::where('id', $id)->first();
        $lembaga = Lembaga::where('id', $penerimaan->lembaga_id)->first();
        $donatur = Donatur::where('id', $penerimaan->donatur_id)->first();
        $prog_penerimaan = Program::where('id', $penerimaan->prog_penerimaan_id)->first();
        $penerimaand = Penerimaan::with([
            'program',
            'donatur'
        ])
            ->where('penerimaan.groupTo', $id)
            ->orWhere('penerimaan.id', $id)
            ->orderBy('penerimaan.id', 'DESC')->get();
        $penerimaanf = Penerimaan::with([
            'program',
            'donatur'
        ])
            ->where('penerimaan.groupTo', $id)
            ->orWhere('penerimaan.id', $id)
            ->orderBy('penerimaan.id', 'DESC')->first();
        // dd($penerimaand[0]);
        // dd($penerimaan);
        $pdf = PDF::loadView('penerimaan.print-kwitansi', compact('today', 'prog_penerimaan', 'donatur', 'penerimaan', 'lembaga', 'penerimaand', 'penerimaanf'));
        return $pdf->stream();
    }

    public function exportExcel()
    {
        return Excel::download(new PenerimaanExport, 'penerimaan.xlsx');
    }
    public function exportExcel2()
    {
        return Excel::download(new ProgramExport, 'penerimaanByProgram.xlsx');
    }
    public function exportExcel3()
    {
        return Excel::download(new TanggalExport, 'penerimaanByTanggal.xlsx');
    }
}
