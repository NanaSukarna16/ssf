<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class StrukturController extends Controller
{
    public $new_struktur;
    public function __construct()
    {
        $this->new_struktur = new Struktur();
    }
    public function index()
    {
        $batas = 8;
        // query tampil berdasarkan request nama;
        $data = Struktur::with('tentang')
        ->orderBy('id', 'DESC')
        ->simplePaginate($batas);

        $data2 = Tentang::all();
        
        $no = $batas * ($data->currentPage() - 1);
        return view('struktur.index', [
            'struktur' => $data, 'no' => $no, 'tentang' => $data2
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

        $this->new_struktur->nama = $request->nama;
        $this->new_struktur->jabatan = $request->jabatan;
        $this->new_struktur->tentang_id = $request->tentang_id;
        $this->new_struktur->img = $namaFile;
        $nm->move(public_path() . '/storage/nazhir', $namaFile);

        $this->new_struktur->save();
        return redirect()->route('struktur')->with('status', 'successfully created');
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
        $struktur_edit = Struktur::find($id);

        return view('struktur.edit', [
            'tentang' => $data, 'struktur' => $struktur_edit
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
        $struktur_edit = Struktur::find($id);
        $struktur_edit->nama = $request->nama;
        $struktur_edit->jabatan = $request->jabatan;
        $struktur_edit->tentang_id = $request->tentang_id;
        $gambarLama = $struktur_edit->img;

        if (!$request->img) {
            $struktur_edit->img = $gambarLama;
        } else {

            if ($request->img != $gambarLama) {
                $nm = $request->img;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

                $struktur_edit->img = $namaFile;
                $nm->move(public_path() . '/storage/nazhir', $namaFile);
            } else {
                $request->img->move(public_path() . '/storage/nazhir', $gambarLama);
            }
        }
        $struktur_edit->save();
        return redirect()->route('struktur')->with('status', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $struktur_hapus = Struktur::findOrFail($id);
        $image_path = "storage/nazhir/" . $struktur_hapus->img;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $struktur_hapus->delete();
        return redirect()->route('struktur')->with('status', 'Successfully deleted');
    }
}
