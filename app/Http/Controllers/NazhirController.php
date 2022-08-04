<?php

namespace App\Http\Controllers;

use App\Models\Nazhir;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class NazhirController extends Controller
{
    public $new_nazhir;
    public function __construct()
    {
        $this->new_nazhir = new Nazhir();
    }
    public function index()
    {
        $batas = 8;
        // query tampil berdasarkan request nama;
        $data = Nazhir::with('tentang')
        ->orderBy('id', 'DESC')
        ->simplePaginate($batas);

        $data2 = Tentang::all();
        
        $no = $batas * ($data->currentPage() - 1);
        return view('nazhir.index', [
            'nazhir' => $data, 'no' => $no, 'tentang' => $data2
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
            'jabatan' => "required",
            'tentang_id' => "required", 
            'img' => "required|mimes:png,jpg,jpeg",  
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong"
        ];

        $this->validate($request, $rules, $messages); 
        $nm = $request->img;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $this->new_nazhir->nama = $request->nama;
        $this->new_nazhir->jabatan = $request->jabatan;
        $this->new_nazhir->tentang_id = $request->tentang_id;
        $this->new_nazhir->img = $namaFile;
        $nm->move(public_path() . '/storage/nazhir', $namaFile);

        $this->new_nazhir->save();
        return redirect()->route('nazhir')->with('status', 'successfully created');
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
        $data  = Tentang::all();
        $nazhir_edit = Nazhir::find($id);

        return view('nazhir.edit', [
            'tentang' => $data, 'nazhir' => $nazhir_edit
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
        $nazhir_edit = Nazhir::find($id);
        $nazhir_edit->nama = $request->nama;
        $nazhir_edit->jabatan = $request->jabatan;
        $nazhir_edit->tentang_id = $request->tentang_id;
        $gambarLama = $nazhir_edit->img;

        if (!$request->img) {
            $nazhir_edit->img = $gambarLama;
        } else {

            if ($request->img != $gambarLama) {
                $nm = $request->img;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

                $nazhir_edit->img = $namaFile;
                $nm->move(public_path() . '/storage/nazhir', $namaFile);
            } else {
                $request->img->move(public_path() . '/storage/nazhir', $gambarLama);
            }
        }
        $nazhir_edit->save();
        return redirect()->route('nazhir')->with('status', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nazhir_hapus = Nazhir::findOrFail($id);
        $image_path = "storage/nazhir/" . $nazhir_hapus->img;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $nazhir_hapus->delete();
        return redirect()->route('nazhir')->with('status', 'Successfully deleted');
    }
}
