<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\Program;
use App\Models\Lembaga;
use Illuminate\Http\Request;
use App\Models\Grup;
use App\Models\ProgPenerimaan;
use App\Models\User;
use App\Models\Penerimaan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $noL = 1;
        $noR = 1;
        // buat paginition
        $batas = 8;
        $grup = Grup::orderBy('id', 'DESC')->simplePaginate($batas);

        // $program = Program::orderBy('nama', 'ASC')->get();
        $program = Penerimaan::select('prog_penerimaan.nama')->join('prog_penerimaan', 'prog_penerimaan.id', 'penerimaan.prog_penerimaan_id')->groupBy('prog_penerimaan.nama')->orderBy('prog_penerimaan.id', 'ASC')->get();

        $relawan = User::orderBy('id', 'desc')->where('role', 'relawan')->get();
        $countRelawan   = Penerimaan::selectRaw("sum(penerimaan.jumlah) as jumlah ,grup.name as grup")
            // ->join('users', 'penerimaan.users_id', 'users.id')
            ->join('grup', 'penerimaan.grup_id', 'grup.id')
            ->groupBy('grup.name')
            // ->where('role', 'relawan')
            ->get();

        $countPerRelawan = Penerimaan::join('users', 'penerimaan.users_id', 'users.id')
            ->join('grup', 'penerimaan.grup_id', 'grup.id')
            ->select('users.id as idUser', 'grup.name as grup', 'users.role as role', 'users.nama as users', 'penerimaan.grup_id', DB::raw('sum(penerimaan.jumlah) as jumlah'))
            ->groupBy('users.id', 'users.nama', 'grup', 'role', 'penerimaan.grup_id')
            ->where('role', 'relawan')
            ->orderBy('grup.name', 'desc')->get();

        $totalGrup = Penerimaan::sum('jumlah');
        $totalProgram   = Penerimaan::join('prog_penerimaan', 'penerimaan.prog_penerimaan_id', 'prog_penerimaan.id')
            ->selectRaw("sum(penerimaan.jumlah) as jumlah ,prog_penerimaan.nama as prog_penerimaan")
            ->orderBy('prog_penerimaan.id', 'desc')
            // ->where('prog_penerimaan.nama', 'not like', "%Beasiswa Lembaga%")
            // ->where('prog_penerimaan.nama', 'not like', "%Wakaf Melalui Uang%")
            // ->where('prog_penerimaan.nama', 'not like', "%Infak terikat%")
            ->groupBy('prog_penerimaan.nama')->simplePaginate($batas);
        // ->get();
        // dd($totalProgram);


        $countProgram = Penerimaan::join('prog_penerimaan', 'penerimaan.prog_penerimaan_id', 'prog_penerimaan.id')->sum('jumlah');

        // dd($countProgram);

        $targetAll = Program::sum('target_jml');
        $targetBeasiswa = Program::where('nama', 'LIKE', '%Beasiswa Lembaga%')->sum('target_jml');
        $Beasiswa = Program::where('nama', 'LIKE', '%Beasiswa Lembaga%')->orderBy('nama', 'asc')->get();
        $totalBeasiswa = Program::join('penerimaan', 'penerimaan.prog_penerimaan_id', 'prog_penerimaan.id')
            ->select('penerimaan.*', 'prog_penerimaan.nama as program')
            ->where('prog_penerimaan.nama', 'LIKE', '%Beasiswa Lembaga%')->sum('jumlah');
        $countBeasiswa = Program::join('penerimaan', 'penerimaan.prog_penerimaan_id', 'prog_penerimaan.id')
            ->selectRaw("sum(penerimaan.jumlah) as jumlah ,prog_penerimaan.nama as prog_penerimaan")
            ->groupBy('prog_penerimaan.nama')
            ->where('prog_penerimaan.nama', 'LIKE', '%Beasiswa Lembaga%')
            ->orderBy('prog_penerimaan.nama', 'asc')
            ->get();


        $totalPenerimaan = Penerimaan::count();
        $totalDonatur = Donatur::count();
        $totalLembaga = Lembaga::count();



        // urutkan nomor sesuai total data
        $no = $batas * ($totalProgram->currentPage() - 1);

        // urutkan nomor sesuai total data
        $no1 = $batas * ($grup->currentPage() - 1);

        return view(
            'home',
            compact(
                'no1',
                'no',
                'totalLembaga',
                'totalDonatur',
                'totalPenerimaan',
                'targetAll',
                'program',
                'countBeasiswa',
                'totalBeasiswa',
                'Beasiswa',
                'countPerRelawan',
                'targetBeasiswa',
                'countProgram',
                'totalProgram',
                'grup',
                'totalGrup',
                'noL',
                'noR',
                'countRelawan',
            )
        );
    }
}
