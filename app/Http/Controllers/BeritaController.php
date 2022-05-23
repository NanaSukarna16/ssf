<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public $new_berita;
    public function __construct()
    {
        $this->new_berita = new Berita();
    }

    public function index()
    {
        // catatan
        $data = Berita::all();
        return view('berita_admin.index', [
            'berita' => $data
        ]);
    }
    public function index1()
    {

        // buat paginition
        $batas = 9;
        $data = Berita::orderBy('id', 'DESC')->simplePaginate($batas);
        return view('halaman_berita.index', [
            'berita' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita_admin.create');
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
            'img_berita' => "required|mimes:png,jpg,jpeg,webp|",
            'judul_berita' => "required",
            'berita' => "required|min:225"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg, .jpeg dan .webp",
            'min' => ":attribute, Deskripsi Berita terlalu Sedikit"
        ];

        $this->validate($request, $rules, $messages);

        $nm = $request->img_berita;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $this->new_berita->judul_berita = $request->judul_berita;
        $this->new_berita->berita = $request->berita;
        $this->new_berita->img_berita = $namaFile;
        $nm->move(public_path() . '/storage/berita', $namaFile);

        $this->new_berita->save();
        return redirect()->route('berita_admin')->with('status', 'successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita_detail = Berita::find($id);

        $berita_lainnya = Berita::where('id', 'not like', $berita_detail->id)
            ->limit(8)
            ->orderBy('id', 'DESC')
            ->get();

        // dd($berita_lainnya)
        return view('halaman_berita.show', [
            'berita_detail' => $berita_detail, 'berita_lainnya' => $berita_lainnya
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita_edit = Berita::find($id);


        return view('berita_admin.edit', [
            'berita' => $berita_edit
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
        $berita_edit = Berita::find($id);
        $berita_edit->judul_berita = $request->judul_berita;
        $berita_edit->berita = $request->berita;
        $gambarLama = $berita_edit->img_berita;

        if (!$request->img_berita) {
            $berita_edit->img_berita = $gambarLama;
        } else {

            if ($request->img_berita != $gambarLama) {
                $nm = $request->img_berita;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

                $berita_edit->img_berita = $namaFile;
                $nm->move(public_path() . '/storage/berita', $namaFile);
            } else {
                $request->foto->move(public_path() . '/storage/berita', $gambarLama);
            }
        }

        $berita_edit->save();
        return redirect()->route('berita_admin')->with('status', 'Berita successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita_hapus = Berita::findOrFail($id);
        $image_path = "storage/berita/" . $berita_hapus->img_berita;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $berita_hapus->delete();
        return redirect()->route('berita_admin')->with('status', 'Successfully deleted');
    }
}
