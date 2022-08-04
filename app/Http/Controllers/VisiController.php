<?php

namespace App\Http\Controllers;

use App\Models\Visi;
use App\Models\Tentang;
use Illuminate\Http\Request;

class VisiController extends Controller
{
    public $new_visi;
    public function __construct()
    {
        $this->new_visi = new Visi();
    }

    public function index()
    {
        $batas = 8;
        // query tampil berdasarkan request nama;
        $data = Visi::with('tentang')
        ->orderBy('id', 'DESC')
        ->simplePaginate($batas);

        $data2 = Tentang::all();
        
        $no = $batas * ($data->currentPage() - 1);
        return view('visi.index', [
            'visi' => $data, 'no' => $no, 'tentang' => $data2
        ]);
    }
    /**
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'visi' => "required",
            'misi' => "required",
            'legalitas' => "required",
            'tentang_id' => "required", 
            'img' => "required|mimes:png,jpg,jpeg",  
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong"
        ];

        $this->validate($request, $rules, $messages); 
        $nm = $request->img;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $this->new_visi->visi = $request->visi;
        $this->new_visi->misi = $request->misi;
        $this->new_visi->legalitas = $request->legalitas;
        $this->new_visi->tentang_id = $request->tentang_id;
        $this->new_visi->img_legalitas = $namaFile;
        $nm->move(public_path() . '/storage/legalitas', $namaFile);

        $this->new_visi->save();
        return redirect()->route('visi')->with('status', 'successfully created');
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
        $visi_edit = Visi::find($id);

        return view('visi.edit', [
            'tentang' => $data, 'visi' => $visi_edit
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
        $visi_edit = Visi::find($id);
        $visi_edit->visi = $request->visi;
        $visi_edit->misi = $request->misi;
        $visi_edit->legalitas = $request->legalitas;
        $visi_edit->tentang_id = $request->tentang_id;
        $gambarLama = $visi_edit->img_legalitas;

        if (!$request->img) {
            $visi_edit->img_legalitas = $gambarLama;
        } else {

            if ($request->img != $gambarLama) {
                $nm = $request->img;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

                $visi_edit->img_legalitas = $namaFile;
                $nm->move(public_path() . '/storage/legalitas', $namaFile);
            } else {
                $request->img->move(public_path() . '/storage/legalitas', $gambarLama);
            }
        }
        $visi_edit->save();
        return redirect()->route('visi')->with('status', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visi_hapus = Visi::findOrFail($id);
        $image_path = "storage/legalitas/" . $visi_hapus->img_legalitas;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $visi_hapus->delete();
        return redirect()->route('visi')->with('status', 'Successfully deleted');
    }
}
