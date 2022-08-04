<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DownloadController extends Controller
{
    public $new_download;
    public function __construct()
    {
        $this->new_download = new Download();
    }

    public function index()
    {
        // menghitung total data
        $jumlah = Download::count();

        // buat paginition
        $batas = 8;

        // Tangkap request nama
        $tangkap = request()->cari;
     
        // query tampil berdasarkan request nama;
        $data = Download::where('nama', 'LIKE', "%$tangkap%")->orderBy('id', 'DESC')->simplePaginate($batas);

        // urutkan nomor sesuai total data
        $no = $batas * ($data->currentPage() - 1);
        return view('download_admin.index', [
            'download' => $data, 'no' => $no, 'jumlah' => $jumlah
        ]);
    }
    public function index1()
    {
        // $data = Download::orderBy('id', 'DESC');
        $data = Download::all();
        $data2 = Tentang::all();

        //  dd($data);
        return view('halaman_download.index', [
            'download' => $data, 'tentang' => $data2
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('download_admin.create');
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
            'img' => "required|mimes:png,jpg,jpeg",
            'file' => ['required', 'mimes:pdf', 'max:500'],
            'nama' => "required"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg, .pdf"
        ];

        $this->validate($request, $rules, $messages);
        $nm = $request->img;
        $nm2 = $request->file;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
        $namaFile2 = time() . rand(100, 999) . "." . $nm2->getClientOriginalExtension();

        $this->new_download->nama = $request->nama;
        $this->new_download->img = $namaFile;
        $this->new_download->file = $namaFile2;
        $nm->move(public_path() . '/storage/download', $namaFile);
        $nm2->move(public_path() . '/storage/download', $namaFile2);

        $this->new_download->save();
        return redirect()->route('download')->with('status', 'successfully created');
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
        $download_edit = Download::find($id);
        return view('download_admin.edit', [
            'download' => $download_edit
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
        $download_edit = Download::find($id);
        $download_edit->nama = $request->nama;
        $gambarLama = $download_edit->img;
        $gambarLama2 = $download_edit->file;

        if (!$request->img && !$request->file) {
            $download_edit->img = $gambarLama;
            $download_edit->file = $gambarLama2;
        } else {
            if (!$request->file) {
                $download_edit->file = $gambarLama2;
                $nm = $request->img;
                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
            
                $download_edit->img = $namaFile;
                $nm->move(public_path() . '/storage/download', $namaFile);
    
             } else if (!$request->img) {
                $download_edit->img = $gambarLama; 
                $nm2 = $request->file;
                $namaFile2 = time() . rand(100, 999) . "." . $nm2->getClientOriginalExtension();
            
                $download_edit->file = $namaFile2;
                $nm2->move(public_path() . '/storage/download', $namaFile2);    
            }else if ($request->img != $gambarLama && $request->file != $gambarLama2) {
                $nm = $request->img;
                $nm2 = $request->file;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
                $namaFile2 = time() . rand(100, 999) . "." . $nm2->getClientOriginalExtension();

                $download_edit->img = $namaFile;
                $download_edit->file = $namaFile2;
                $nm->move(public_path() . '/storage/download', $namaFile);
                $nm2->move(public_path() . '/storage/download', $namaFile2);
            } else{
                $request->img->move(public_path() . '/storage/download', $gambarLama);
                $request->file->move(public_path() . '/storage/download', $gambarLama2);
            }
        }

        $download_edit->save();
        return redirect()->route('download')->with('status', 'Download successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $download_hapus = Download::findOrFail($id);
        $image_path = "storage/download/" . $download_hapus->img;
        $image_path2 = "storage/download/" . $download_hapus->file;

        if (File::exists($image_path) && File::exists($image_path2) ) {
            File::delete($image_path);
            File::delete($image_path2);
        }

        $download_hapus->delete();
        return redirect()->route('download')->with('status', 'Successfully deleted');
    }
}
