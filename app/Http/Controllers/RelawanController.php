<?php

namespace App\Http\Controllers;

use App\Models\Grup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RelawanController extends Controller
{

    public $new_relawan;
    public function __construct()
    {
        $this->new_relawan = new User();
    }

    public function index()
    {
        // buat paginition
        $batas = 8;

        // Tangkap request nama
        $tangkap = request()->cari;

        // query tampil berdasarkan request nama;
        $data = User::where('nama', 'LIKE', "%$tangkap%")
        ->orWhere('role', 'NOT LIKE', 'inputer')
        ->with('grup')
        ->orderBy('id', 'DESC')
        ->simplePaginate($batas);

        $data1 = User::Where('role', 'NOT LIKE', 'inputer')->get();
        
        // menghitung total data
        $jumlah = $data1->count();


        // urutkan nomor sesuai total data
        $no = $batas * ($data->currentPage() - 1);

        return view('relawan.index', [
            'relawan' => $data, 'total' => $jumlah, 'no' => $no
        ]);
    }

      public function index1()
    {
        
        // buat paginition
        $batas = 8;

        // Tangkap request nama
        $tangkap = request()->cari;

        // query tampil berdasarkan request nama;
        // $data = User::where('nama', 'LIKE', "%$tangkap%")
        // ->orWhere('role', 'LIKE', 'inputer')
        // ->simplePaginate($batas);

        $data1 = User::simplePaginate($batas);

        // menghitung total data
        $jumlah = $data1->count();

        // urutkan nomor sesuai total data
        $no = $batas * ($data1->currentPage() - 1);

        return view('user.index', [
            'user' => $data1, 'total' => $jumlah, 'no' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Grup::all();
        return view('relawan.create', [
            'grup' => $data,
        ]);
    }

     public function create1()
    {
        return view('user.create');
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
            'grup_id' => "required",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong"
        ];

        $this->validate($request, $rules, $messages);

        $this->new_relawan->nama = $request->nama;
        $this->new_relawan->grup_id = $request->grup_id;
        $this->new_relawan->hp = $request->hp;
        $this->new_relawan->email = $request->email;
        $this->new_relawan->ktp = $request->ktp;
        $this->new_relawan->tmptlhr = $request->tmptlhr;
        $this->new_relawan->tgllhr = $request->tgllhr;
        $this->new_relawan->jk = $request->jk;
        $this->new_relawan->alamat = $request->alamat;
        $this->new_relawan->kelurahan = $request->kelurahan;
        $this->new_relawan->kecamatan = $request->kecamatan;
        $this->new_relawan->kota = $request->kota;
        $this->new_relawan->provinsi = $request->provinsi;
        $this->new_relawan->kdpos = $request->kdpos;
        $this->new_relawan->negara = $request->negara;

        $this->new_relawan->save();
        return redirect()->route('relawan')->with('status', 'Relawan successfully created');
    }

     public function store1(Request $request)
    {
        $rules = [
            'nama' => "required",
            'role' => "required",
            'email' => "required",
            'password' => "required",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong"
        ];

        $this->validate($request, $rules, $messages);

        $this->new_relawan->nama = $request->nama;
        $this->new_relawan->password = Hash::make($request['password']);
        $this->new_relawan->role = $request->role;
        $this->new_relawan->hp = $request->hp;
        $this->new_relawan->email = $request->email;
        $this->new_relawan->ktp = $request->ktp;
        $this->new_relawan->tmptlhr = $request->tmptlhr;
        $this->new_relawan->tgllhr = $request->tgllhr;
        $this->new_relawan->jk = $request->jk;
        $this->new_relawan->alamat = $request->alamat;
        $this->new_relawan->kelurahan = $request->kelurahan;
        $this->new_relawan->kecamatan = $request->kecamatan;
        $this->new_relawan->kota = $request->kota;
        $this->new_relawan->provinsi = $request->provinsi;
        $this->new_relawan->kdpos = $request->kdpos;
        $this->new_relawan->negara = $request->negara;



        $this->new_relawan->save();
        return redirect()->route('user')->with('status', 'User successfully created');
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
        $relawan_edit = User::find($id);
        $data = Grup::all();

        return view('relawan.edit', [
            'relawan' => $relawan_edit, 'grup' => $data
        ]);
    }

    // public function edit($id)
    // {
    //     $user_edit = User::find($id);
    //     return view('relawan.edit', [
    //         'relawan' => $relawan_edit, 'grup' => $data
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $relawan_edit = User::find($id);
        $relawan_edit->nama = $request->nama;
        $relawan_edit->grup_id = $request->grup_id;
        $relawan_edit->hp = $request->hp;
        $relawan_edit->email = $request->email;
        $relawan_edit->alamat = $request->alamat;
        $relawan_edit->ktp = $request->ktp;
        $relawan_edit->tmptlhr = $request->tmptlhr;
        $relawan_edit->tgllhr = $request->tgllhr;
        $relawan_edit->jk = $request->jk;
        $relawan_edit->kelurahan = $request->kelurahan;
        $relawan_edit->kecamatan = $request->kecamatan;
        $relawan_edit->kota = $request->kota;
        $relawan_edit->provinsi = $request->provinsi;
        $relawan_edit->kdpos = $request->kdpos;
        $relawan_edit->negara = $request->negara;

        $relawan_edit->save();
        return redirect()->route('relawan')->with('status', 'Relawan successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relawan_hapus = User::findOrFail($id);

        $relawan_hapus->delete();
        return redirect()->route('relawan')->with('status', 'Relawan successfully deleted');
    }
}
