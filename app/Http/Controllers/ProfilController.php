<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public $new_profil;
    public function __construct()
    {
        $this->new_profil = new Profil();
    }
    public function index()
    {
        $batas = 8;
        // query tampil berdasarkan request nama;
        $data = Profil::with('tentang')
        ->orderBy('id', 'DESC')
        ->simplePaginate($batas);

        $data2 = Tentang::all();
        
        $no = $batas * ($data->currentPage() - 1);
        return view('profil.index', [
            'profil' => $data, 'no' => $no, 'tentang' => $data2
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
            'profil' => "required",
            'tentang_id' => "required", 
            'img' => "required|mimes:png,jpg,jpeg",  
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong"
        ];

        $this->validate($request, $rules, $messages); 
        $nm = $request->img;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $this->new_profil->profil = $request->profil;
        $this->new_profil->tentang_id = $request->tentang_id;
        $this->new_profil->img = $namaFile;
        $nm->move(public_path() . '/storage/profil', $namaFile);

        $this->new_profil->save();
        return redirect()->route('profil')->with('status', 'successfully created');
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
        $profil_edit = Profil::find($id);

        return view('profil.edit', [
            'tentang' => $data, 'profil' => $profil_edit
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
        $profil_edit = Profil::find($id);
        $profil_edit->profil = $request->profil;
        $profil_edit->tentang_id = $request->tentang_id;
        $gambarLama = $profil_edit->img;

        if (!$request->img) {
            $profil_edit->img = $gambarLama;
        } else {

            if ($request->img != $gambarLama) {
                $nm = $request->img;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

                $profil_edit->img = $namaFile;
                $nm->move(public_path() . '/storage/profil', $namaFile);
            } else {
                $request->img->move(public_path() . '/storage/profil', $gambarLama);
            }
        }
        $profil_edit->save();
        return redirect()->route('profil')->with('status', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profil_hapus = Profil::findOrFail($id);
        $image_path = "storage/profil/" . $profil_hapus->img;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $profil_hapus->delete();
        return redirect()->route('profil')->with('status', 'Successfully deleted');
    }
}
