<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Program;
use App\Models\Penerimaan;
use App\Models\Donatur;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    public $new_donatur, $new_penerimaan;
    public function __construct()
    {
        $this->new_donatur = new Donatur();
        $this->new_penerimaan = new Penerimaan();
    }

    public function index()
    {
        $data2 = Tentang::all();
        $data = Campaign::all();
        return view('halaman_donasi.index', [
            'campaign' => $data, 'tentang' => $data2
        ]);
    }

    public function index1($id)
    {
        
        $data = Campaign::find($id);
        $data2 = Campaign::all();
        $data3 = Tentang::all();
        return view('halaman_donasi.donasi', [
            'campaign2' => $data, 'campaign' => $data2, 'tentang' => $data3
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
            'bukti' => "required|mimes:png,jpg,jpeg,webp|",
            'jumlah' => "required",
            'no' => "required",
            'campaign' => "required",
            'nama' => "required",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg, .jpeg dan .webp",
            'min' => ":attribute, Deskripsi Berita terlalu Sedikit"
        ];

        $this->validate($request, $rules, $messages);

        $nm = $request->bukti;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $donatur = Donatur::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'hp' => $request->no,
        ]);

        $this->new_penerimaan->campaign_id = $request->campaign;
        $this->new_penerimaan->jumlah = $request->jumlah;
        $this->new_penerimaan->bukti = $namaFile;
        $this->new_penerimaan->donatur_id = $donatur->id;
        $nm->move(public_path() . '/storage/bukti_transfer', $namaFile);

        $this->new_penerimaan->save();
        return redirect()->route('program_web')->with('status', 'successfully Donasi');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
