<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Program;
use App\Models\Penerimaan;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class CampaignController extends Controller
{
    public $new_campaig, $new_penerimaan;
    public function __construct()
    {
        $this->new_campaign = new Campaign();
        $this->new_penerimaan = new Penerimaan();
    }

    public function index()
    {
        $data = Campaign::all();

        $totalProgram   = Penerimaan::join('campaign', 'campaign_id', 'campaign.id')
            ->select('campaign.id as id', 'campaign.waktu','campaign.nama as nama', DB::raw('sum(penerimaan.jumlah) /campaign.target_jumlah * 100 as persen'), DB::raw('sum(penerimaan.jumlah) as jumlah'), 'campaign.target_jumlah as target', 'campaign.img as img')
            ->groupByRaw('nama, target, img, waktu, id')->get();

        // dd($data);
        return view('program_admin.index', [
            'campaign' => $data, 'jumlah' => $totalProgram
        ]);
    }
    public function index1()
    {
        $data = Tentang::all();
        $totalProgram   = Penerimaan::join('campaign', 'campaign_id', 'campaign.id')
            // ->select('*')
            ->select('campaign.id as id', 'campaign.waktu','campaign.nama as nama', DB::raw('sum(penerimaan.jumlah) /campaign.target_jumlah * 100 as persen'), DB::raw('sum(penerimaan.jumlah) as jumlah'), 'campaign.target_jumlah as target', 'campaign.img as img')
            ->groupByRaw('nama, target, img, waktu, id')->get();
       
        return view('halaman_program.index',[
            'campaign' => $totalProgram, 'tentang' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data2 = Program::orderBy('id', 'DESC')->get();
        return view('program_admin.create', [
            'program' => $data2
        ]);
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
            'img' => "required|mimes:png,jpg,jpeg,webp|",
            // 'waktu' => "required",
            'detail' => "required",
            'nama' => "required",
            // 'target' => "required"
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg, .jpeg dan .webp",
            'min' => ":attribute, Deskripsi Berita terlalu Sedikit"
        ];

        $this->validate($request, $rules, $messages);

        $nm = $request->img;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $campaign = Campaign::create([
            'nama' => $request->nama,
            'waktu' => $request->waktu,
            'detail' => $request->detail,
            'target_jumlah' => $request->target,
            'img' => $namaFile, 
            'video' => $request->video
        ]);

        $this->new_penerimaan->campaign_id = $campaign->id;
        $nm->move(public_path() . '/storage/campaign', $namaFile);

        // $this->new_campaign->save();
        $this->new_penerimaan->save();
        return redirect()->route('campaign')->with('status', 'successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $program_detail  = Penerimaan::join('campaign', 'campaign_id', 'campaign.id')
            ->select('campaign.video as video', 'campaign.target_jumlah as target', 'campaign.detail as detail', 'campaign.id as id', 'campaign.waktu','campaign.nama as nama', DB::raw('sum(penerimaan.jumlah) /campaign.target_jumlah * 100 as persen'), DB::raw('sum(penerimaan.jumlah) as jumlah'), 'campaign.target_jumlah as target', 'campaign.img as img')
            ->groupByRaw('detail, nama, target, img, waktu, id, target, video')
            ->where('campaign.id', $id)->first();

        $program_lainnya  = Penerimaan::join('campaign', 'campaign_id', 'campaign.id')
            ->select('campaign.video as video', 'campaign.target_jumlah as target', 'campaign.detail as detail', 'campaign.id as id', 'campaign.waktu','campaign.nama as nama', DB::raw('sum(penerimaan.jumlah) /campaign.target_jumlah * 100 as persen'), DB::raw('sum(penerimaan.jumlah) as jumlah'), 'campaign.target_jumlah as target', 'campaign.img as img')
            ->groupByRaw('detail, nama, target, img, waktu, id, target, video')
            ->where('campaign.id', 'not like', $program_detail->id)->limit(8)->orderBy('id', 'DESC')->get();    
        // dd($program_lainnya);
        return view('halaman_program.show', [
            'program_detail' => $program_detail, 'program_lainnya' => $program_lainnya
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
        //
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
        $campaign_hapus = Campaign::findOrFail($id);
        $image_path = "storage/campaign/" . $campaign_hapus->img;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $campaign_hapus->delete();
        return redirect()->route('campaign')->with('status', 'Successfully deleted');
    }
}
