<?php

namespace App\Http\Controllers;

use App\Exports\DonaturExport;
use App\Models\Donatur;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DonaturController extends Controller
{
    public $new_donatur;
    public function __construct()
    {
        $this->new_donatur = new Donatur();
    }
    public function index()
    {
        // menghitung total data
        $jumlah = Donatur::count();

        // buat paginition
        $batas = 8;

        // Tangkap request nama
        $tangkap = request()->cari;
        // $batas1 = $request->page;

        // query tampil berdasarkan request nama;
        $data = Donatur::where('nama', 'LIKE', "%$tangkap%")->orderBy('id', 'DESC')->simplePaginate($batas);

        // urutkan nomor sesuai total data
        $no = $batas * ($data->currentPage() - 1);

        return view('donatur.index', [
            'donatur' => $data, 'total' => $jumlah, 'no' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donatur.create');
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
            'nama' => "required",
            'hp' => "required",
            'kode' => "required|unique:donatur,kode"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'unique' => ":attribute sudah ada, gunakan kode lain"
        ];

        $this->validate($request, $rules, $messages);

        $this->new_donatur->kode = $request->kode;
        $this->new_donatur->nama = $request->nama;
        $this->new_donatur->hp = $request->hp;
        $this->new_donatur->email = $request->email;
        $this->new_donatur->npwp = $request->npwp;
        $this->new_donatur->npwz = $request->npwz;
        $this->new_donatur->ktp = $request->ktp;
        $this->new_donatur->tmptlhr = $request->tmptlhr;
        $this->new_donatur->tgllhr = $request->tgllhr;
        $this->new_donatur->jk = $request->jk;
        $this->new_donatur->alamat = $request->alamat;
        $this->new_donatur->kelurahan = $request->kelurahan;
        $this->new_donatur->kecamatan = $request->kecamatan;
        $this->new_donatur->kota = $request->kota;
        $this->new_donatur->provinsi = $request->provinsi;
        $this->new_donatur->kdpos = $request->kdpos;
        $this->new_donatur->negara = $request->negara;
        $this->new_donatur->person_at = $request->person_at;


        $this->new_donatur->save();
        return redirect()->route('donatur')->with('status', 'Donatur successfully created');
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
        $donatur_edit = Donatur::find($id);


        return view('donatur.edit', [
            'donatur' => $donatur_edit
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
        $donatur_edit = Donatur::find($id);

        $donatur_edit->kode = $request->kode;
        $donatur_edit->nama = $request->nama;
        $donatur_edit->hp = $request->hp;
        $donatur_edit->email = $request->email;
        $donatur_edit->npwp = $request->npwp;
        $donatur_edit->npwp = $request->npwp;
        $donatur_edit->npwz = $request->npwz;
        $donatur_edit->ktp = $request->ktp;
        $donatur_edit->tmptlhr = $request->tmptlhr;
        $donatur_edit->tgllhr = $request->tgllhr;
        $donatur_edit->jk = $request->jk;
        $donatur_edit->alamat = $request->alamat;
        $donatur_edit->kelurahan = $request->kelurahan;
        $donatur_edit->kecamatan = $request->kecamatan;
        $donatur_edit->kota = $request->kota;
        $donatur_edit->provinsi = $request->provinsi;
        $donatur_edit->kdpos = $request->kdpos;
        $donatur_edit->negara = $request->negara;
        $donatur_edit->person_at = $request->person_at;

        $donatur_edit->save();
        return redirect()->route('donatur')->with('status', 'Donatur successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donatur_hapus = Donatur::findOrFail($id);

        $donatur_hapus->delete();
        return redirect()->route('donatur')->with('status', 'Donatur successfully deleted');
    }

    public function donaturExcel()
    {
        return Excel::download(new DonaturExport, 'donatur.xlsx');
    }
}
