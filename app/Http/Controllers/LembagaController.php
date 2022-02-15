<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public $new_lembaga;
    public function __construct()
    {
        $this->new_lembaga = new Lembaga();
    }

    public function index()
    {
        // menghitung total data
        $jumlah = Lembaga::count();

        // buat paginition
        $batas = 8;

        // Tangkap request nama
        $tangkap = request()->cari;
        // $batas1 = $request->page;

        // query tampil berdasarkan request nama;
        $data = Lembaga::where('nama_lembaga', 'LIKE', "%$tangkap%")->orderBy('id', 'DESC')->simplePaginate($batas);

        // urutkan nomor sesuai total data
        $no = $batas * ($data->currentPage() - 1);

        return view('lembaga.index', [
            'lembaga' => $data, 'total' => $jumlah, 'no' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lembaga.create');
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
            'nama_lembaga' => "required",
            'hp_lembaga' => "required",
            'email_lembaga' => "required",
            'legalitas_lembaga' => "required",
            'no_rek_lembaga' => "required",
            'npwp_lembaga' => "required",
            'alamat_lembaga' => "required",
            'kelurahan_lembaga' => "required",
            'kecamatan_lembaga' => "required",
            'kota_lembaga' => "required",
            'provinsi_lembaga' => "required",
            'kdpos_lembaga' => "required",
            'negara_lembaga' => "required",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong"
        ];

        $this->validate($request, $rules, $messages);

        $this->new_lembaga->nama_lembaga = $request->nama_lembaga;
        $this->new_lembaga->hp_lembaga = $request->hp_lembaga;
        $this->new_lembaga->email_lembaga = $request->email_lembaga;
        $this->new_lembaga->no_rek_lembaga = $request->no_rek_lembaga;
        $this->new_lembaga->legalitas_lembaga = $request->legalitas_lembaga;
        $this->new_lembaga->npwp_lembaga = $request->npwp_lembaga;
        $this->new_lembaga->alamat_lembaga = $request->alamat_lembaga;
        $this->new_lembaga->kelurahan_lembaga = $request->kelurahan_lembaga;
        $this->new_lembaga->kecamatan_lembaga = $request->kecamatan_lembaga;
        $this->new_lembaga->kota_lembaga = $request->kota_lembaga;
        $this->new_lembaga->provinsi_lembaga = $request->provinsi_lembaga;
        $this->new_lembaga->kdpos_lembaga = $request->kdpos_lembaga;
        $this->new_lembaga->negara_lembaga = $request->negara_lembaga;
        $this->new_lembaga->nama_person = $request->nama_person;
        $this->new_lembaga->hp_person = $request->hp_person;
        $this->new_lembaga->email_person = $request->email_person;
        $this->new_lembaga->ktp_person = $request->ktp_person;
        $this->new_lembaga->jk = $request->jk;
        $this->new_lembaga->tmptlhr_person = $request->tmptlhr_person;
        $this->new_lembaga->tgllhr_person = $request->tgllhr_person;
        $this->new_lembaga->alamat_person = $request->alamat_person;
        $this->new_lembaga->kelurahan_person = $request->kelurahan_person;
        $this->new_lembaga->kecamatan_person = $request->kecamatan_person;
        $this->new_lembaga->kota_person = $request->kota_person;
        $this->new_lembaga->provinsi_person = $request->provinsi_person;
        $this->new_lembaga->kdpos_person = $request->kdpos_person;
        $this->new_lembaga->negara_person = $request->negara_person;


        $this->new_lembaga->save();
        return redirect()->route('lembaga')->with('status', 'Lembaga successfully created');
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
        $lembaga_edit = Lembaga::find($id);


        return view('lembaga.edit', [
            'lembaga' => $lembaga_edit
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
        $lembaga_edit = Lembaga::find($id);
        $lembaga_edit->nama_lembaga = $request->nama_lembaga;
        $lembaga_edit->hp_lembaga = $request->hp_lembaga;
        $lembaga_edit->email_lembaga = $request->email_lembaga;
        $lembaga_edit->no_rek_lembaga = $request->no_rek_lembaga;
        $lembaga_edit->legalitas_lembaga = $request->legalitas_lembaga;
        $lembaga_edit->npwp_lembaga = $request->npwp_lembaga;
        $lembaga_edit->alamat_lembaga = $request->alamat_lembaga;
        $lembaga_edit->kelurahan_lembaga = $request->kelurahan_lembaga;
        $lembaga_edit->kecamatan_lembaga = $request->kecamatan_lembaga;
        $lembaga_edit->kota_lembaga = $request->kota_lembaga;
        $lembaga_edit->provinsi_lembaga = $request->provinsi_lembaga;
        $lembaga_edit->kdpos_lembaga = $request->kdpos_lembaga;
        $lembaga_edit->negara_lembaga = $request->negara_lembaga;
        $lembaga_edit->nama_person = $request->nama_person;
        $lembaga_edit->hp_person = $request->hp_person;
        $lembaga_edit->email_person = $request->email_person;
        $lembaga_edit->ktp_person = $request->ktp_person;
        $lembaga_edit->jk = $request->jk;
        $lembaga_edit->tmptlhr_person = $request->tmptlhr_person;
        $lembaga_edit->tgllhr_person = $request->tgllhr_person;
        $lembaga_edit->alamat_person = $request->alamat_person;
        $lembaga_edit->kelurahan_person = $request->kelurahan_person;
        $lembaga_edit->kecamatan_person = $request->kecamatan_person;
        $lembaga_edit->kota_person = $request->kota_person;
        $lembaga_edit->provinsi_person = $request->provinsi_person;
        $lembaga_edit->kdpos_person = $request->kdpos_person;
        $lembaga_edit->negara_person = $request->negara_person;

        $lembaga_edit->save();
        return redirect()->route('lembaga')->with('status', 'Lembaga successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lembaga_hapus = Lembaga::findOrFail($id);

        $lembaga_hapus->delete();
        return redirect()->route('lembaga')->with('status', 'lembaga successfully deleted');
    }
}
