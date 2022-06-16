<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use App\Models\Mitra;
use App\Models\Video;
use App\Models\Berita;
use App\Models\Donatur;
use App\Models\Tentang;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class HalHomeController extends Controller
{
    public $new_lp, $new_mitra, $new_video;
    public function __construct()
    {
        $this->new_lp = new LandingPage();
        $this->new_mitra = new Mitra();
        $this->new_video = new Video();
    }

    public function index()
    {
        $data = LandingPage::all();
        $data2 = Mitra::all();
        $data3 = Video::where('jenis', 'testimoni')->get();
        $data4 = Video::where('jenis', 'penerima')->get();

        return view('home_admin.index', [
            'lp' => $data, 'mitra' => $data2, 'video' => $data3, 'video2' => $data4
        ]);
    }
    public function index1()
    {
        $data = LandingPage::all();
        $data2 = Mitra::all();
        $data3 = Video::where('jenis', 'testimoni')->get();
        $data5 = Video::where('jenis', 'penerima')->get();
        $data4 = Berita::limit('3')->orderBy('id', 'DESC')->get();
        $data6 = Tentang::all();
        $jumlah = Donatur::count();
        $totalProgram   = Penerimaan::join('campaign', 'campaign_id', 'campaign.id')
            ->select('campaign.id as id', 'campaign.waktu','campaign.nama as nama', DB::raw('sum(penerimaan.jumlah) /campaign.target_jumlah * 100 as persen'), DB::raw('sum(penerimaan.jumlah) as jumlah'), 'campaign.target_jumlah as target', 'campaign.img as img')
            ->groupByRaw('nama, target, img, waktu, id')->limit('4')->orderBy('id', 'DESC')->get();

        return view('halaman_home.index', [
            'home' => $data, 'mitra' => $data2, 'video' => $data3, 'berita_terbaru' => $data4,
            'video2' => $data5, 'jumlahDonatur' => $jumlah, 'program' => $totalProgram, 'tentang' => $data6
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
            'img_lp' => "mimes:png,jpg,jpeg,webp|",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg, .jpeg dan .webp"
        ];

        $this->validate($request, $rules, $messages);

        $nm = $request->img_lp;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $this->new_lp->img_lp = $namaFile;
        $nm->move(public_path() . '/storage/lp', $namaFile);

        $this->new_lp->save();
        return redirect()->route('home_admin')->with('status', 'successfully created');
    }

    public function store2(Request $request)
    {

        $rules = [
            'img_mitra' => "mimes:png,jpg,jpeg,webp|",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg, .jpeg dan .webp"
        ];

        $this->validate($request, $rules, $messages);
        $nm2 = $request->img_mitra;

        $namaFile2 = time() . rand(100, 999) . "." . $nm2->getClientOriginalExtension();

        $this->new_mitra->img_mitra = $namaFile2;
        $nm2->move(public_path() . '/storage/lp', $namaFile2);

        $this->new_mitra->save();
        return redirect()->route('home_admin')->with('status', 'successfully created');
    }
    public function store3(Request $request)
    {

        $rules = [
            'video' => "required",
            'judul_video' => "required",
            'jenis' => "required",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
        ];

        $this->validate($request, $rules, $messages);

        $this->new_video->judul_video = $request->judul_video;
        $this->new_video->video = $request->video;
        $this->new_video->jenis = $request->jenis;

        $this->new_video->save();
        return redirect()->route('home_admin')->with('status', 'successfully created');
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
        $lp_edit = LandingPage::find($id);


        return view('home_admin.edit', [
            'lp' => $lp_edit
        ]);
    }

    public function edit2($id)
    {
        $mitra_edit = Mitra::find($id);


        return view('home_admin.edit2', [
            'mitra' => $mitra_edit
        ]);
    }

    public function edit3($id)
    {
        $video_edit = Video::find($id);


        return view('home_admin.edit3', [
            'video' => $video_edit
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
        $lp_edit = LandingPage::find($id);
        $gambarLama = $lp_edit->img_lp;

        if (!$request->img_lp) {
            $lp_edit->img_lp = $gambarLama;
        } else {
            if ($request->img_lp != $gambarLama) {
                $nm = $request->img_lp;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

                $lp_edit->img_lp = $namaFile;
                $nm->move(public_path() . '/storage/lp', $namaFile);
            } else {
                $request->img_lp->move(public_path() . '/storage/lp', $gambarLama);
            }
        }

        $lp_edit->save();
        return redirect()->route('home_admin')->with('status', 'successfully updated');
    }

    public function update2(Request $request, $id)
    {
        $mitra_edit = Mitra::find($id);
        $gambarLama = $mitra_edit->img_mitra;

        if (!$request->img_mitra) {
            $mitra_edit->img_mitra = $gambarLama;
        } else {
            if ($request->img_mitra != $gambarLama) {
                $nm = $request->img_mitra;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

                $mitra_edit->img_mitra = $namaFile;
                $nm->move(public_path() . '/storage/lp', $namaFile);
            } else {
                $request->img_mitra->move(public_path() . '/storage/lp', $gambarLama);
            }
        }

        $mitra_edit->save();
        return redirect()->route('home_admin')->with('status', 'successfully updated');
    }

    public function update3(Request $request, $id)
    {
        $video_edit = Video::find($id);
        $video_edit->judul_video = $request->judul_video;
        $video_edit->video = $request->video;
        $video_edit->jenis = $request->jenis;

        $video_edit->save();
        return redirect()->route('home_admin')->with('status', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lp_hapus = LandingPage::findOrFail($id);
        $image_path = "storage/lp/" . $lp_hapus->img_lp;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $lp_hapus->delete();
        return redirect()->route('home_admin')->with('status', 'Successfully deleted');
    }
    public function destroy2($id)
    {
        $mitra_hapus = Mitra::findOrFail($id);
        $image_path = "storage/lp/" . $mitra_hapus->img_mitra;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $mitra_hapus->delete();
        return redirect()->route('home_admin')->with('status', 'Successfully deleted');
    }
    public function destroy3($id)
    {
        $video_hapus = Video::findOrFail($id);
        $video_hapus->delete();
        return redirect()->route('home_admin')->with('status', 'Successfully deleted');
    }
}
