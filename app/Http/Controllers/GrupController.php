<?php

namespace App\Http\Controllers;

use App\Models\Grup;
use Illuminate\Http\Request;

class GrupController extends Controller
{
    public $new_grup;
    public function __construct()
    {
        $this->new_grup = new Grup();
    }

    public function index()
    {
        // menghitung total data
        $jumlah = Grup::count();

        // buat paginition
        $batas = 8;

        // Tangkap request nama
        $tangkap = request()->cari;
        // $batas1 = $request->page;

        // query tampil berdasarkan request nama;
        $data = Grup::where('name', 'LIKE', "%$tangkap%")->orderBy('id', 'DESC')->simplePaginate($batas);

        // urutkan nomor sesuai total data
        $no = $batas * ($data->currentPage() - 1);

        return view('grup.index', [
            'grup' => $data, 'total' => $jumlah, 'no' => $no
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

        $this->new_grup->name = $request->nama;


        $this->new_grup->save();
        return redirect()->route('grup')->with('status', 'Grup successfully created');
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
        $grup_edit = Grup::find($id);

        return view('grup.edit', [
            'grup' => $grup_edit
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

        $grup_edit = Grup::find($id);
        $grup_edit->name = $request->nama;

        $grup_edit->save();
        return redirect()->route('grup')->with('status', 'Grup successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grup_hapus = Grup::findOrFail($id);

        $grup_hapus->delete();
        return redirect()->route('grup')->with('status', 'Grup successfully deleted');
    }
}
