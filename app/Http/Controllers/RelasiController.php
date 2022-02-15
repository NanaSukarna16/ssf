<?php

namespace App\Http\Controllers;

use App\Models\Relasi;
use Illuminate\Http\Request;

class RelasiController extends Controller
{
    public $new_relasi;
    public function __construct()
    {
        $this->new_relasi = new Relasi();
    }

    public function index()
    {
        // menghitung total data
        $jumlah = Relasi::count();

        // buat paginition
        $batas = 8;

        // Tangkap request nama
        $tangkap = request()->cari;
        // $batas1 = $request->page;

        // query tampil berdasarkan request nama;
        $data = Relasi::where('nama', 'LIKE', "%$tangkap%")->orderBy('id', 'DESC')->simplePaginate($batas);

        // urutkan nomor sesuai total data
        $no = $batas * ($data->currentPage() - 1);

        return view('relasi.index', [
            'relasi' => $data, 'total' => $jumlah, 'no' => $no
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
            'nama' => "required",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong"
        ];

        $this->validate($request, $rules, $messages);

        $this->new_relasi->nama = $request->nama;


        $this->new_relasi->save();
        return redirect()->route('relasi')->with('status', 'Relasi successfully created');
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
        $relasi_edit = Relasi::find($id);

        return view('relasi.edit', [
            'relasi' => $relasi_edit
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
        $relawan_edit = Relasi::find($id);
        $relawan_edit->nama = $request->nama;

        $relawan_edit->save();
        return redirect()->route('relawan')->with('status', 'Relawanh successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relasi_hapus = Relasi::findOrFail($id);

        $relasi_hapus->delete();
        return redirect()->route('relasi')->with('status', 'Relasi successfully deleted');
    }
}
