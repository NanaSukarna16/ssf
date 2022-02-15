<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    public $new_rekening;
    public function __construct()
    {
        $this->new_rekening = new Rekening();
    }
    public function index()
    {
        // menghitung total data
        $jumlah = Rekening::count();

        // buat paginition
        $batas = 8;

        // Tangkap request nama
        $tangkap = request()->cari;
        // $batas1 = $request->page;

        // query tampil berdasarkan request nama;
        $data = Rekening::where('nama_pemilik_rekening', 'LIKE', "%$tangkap%")->orderBy('id', 'DESC')->simplePaginate($batas);

        // urutkan nomor sesuai total data
        $no = $batas * ($data->currentPage() - 1);

        return view('rekening.index', [
            'rekening' => $data, 'total' => $jumlah, 'no' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'bank' => "required",
            'kegunaan' => "required",
            'nama_pemilik_rekening' => "required",
            'cabang' => "required",
            'no_rek' => "required"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong"
        ];

        $this->validate($request, $rules, $messages);

        $this->new_rekening->bank = $request->bank;
        $this->new_rekening->kegunaan = $request->kegunaan;
        $this->new_rekening->nama_pemilik_rekening = $request->nama_pemilik_rekening;
        $this->new_rekening->cabang = $request->cabang;
        $this->new_rekening->no_rek = $request->no_rek;

        $this->new_rekening->save();
        return redirect()->route('rekening')->with('status', 'Rekening successfully created');
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
        $rekening_edit = Rekening::find($id);

        return view('rekening.edit', [
            'rekening' => $rekening_edit
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
        $rekening_edit = Rekening::find($id);
        $rekening_edit->bank = $request->bank;
        $rekening_edit->kegunaan = $request->kegunaan;
        $rekening_edit->nama_pemilik_rekening = $request->nama_pemilik_rekening;
        $rekening_edit->cabang = $request->cabang;
        $rekening_edit->no_rek = $request->no_rek;


        $rekening_edit->save();
        return redirect()->route('rekening')->with('status', 'Rekening successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rekening_hapus = Rekening::findOrFail($id);

        $rekening_hapus->delete();
        return redirect()->route('rekening')->with('status', 'Rekening successfully deleted');
    }
}
