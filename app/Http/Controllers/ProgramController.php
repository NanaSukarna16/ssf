<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public $new_program;
    public function __construct()
    {
        $this->new_program = new Program();
    }

    public function index()
    {
        // menghitung total data
        $jumlah = Program::count();

        // buat paginition
        $batas = 8;

        // Tangkap request nama
        $tangkap = request()->cari;
        // $batas1 = $request->page;

        // query tampil berdasarkan request nama;
        $data = Program::where('nama', 'LIKE', "%$tangkap%")->orderBy('id', 'DESC')->simplePaginate($batas);

        // urutkan nomor sesuai total data
        $no = $batas * ($data->currentPage() - 1);

        return view('program.index', [
            'program' => $data, 'total' => $jumlah, 'no' => $no
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
            'keterangan' => "required",
            'target_jml' => "required",

        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong"
        ];

        $this->validate($request, $rules, $messages);

        $this->new_program->nama = $request->nama;
        $this->new_program->keterangan = $request->keterangan;
        $this->new_program->target_jml = $request->target_jml;
        $this->new_program->save();
        return redirect()->route('program')->with('status', 'Program successfully created');
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
        $program_edit = Program::find($id);

        return view('program.edit', [
            'program' => $program_edit
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
        $program_edit = Program::find($id);
        $program_edit->nama = $request->nama;
        $program_edit->keterangan = $request->keterangan;
        $program_edit->target_jml = $request->target_jml;

        $program_edit->save();
        return redirect()->route('program')->with('status', 'Program successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program_hapus = Program::findOrFail($id);

        $program_hapus->delete();
        return redirect()->route('program')->with('status', 'Program successfully deleted');
    }
}
