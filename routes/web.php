<?php

use App\Http\Controllers\DonaturController;
use App\Http\Controllers\GrupController;
use App\Http\Controllers\HalHomeController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RelasiController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\NazhirController;
use App\Http\Controllers\StrukturController;
use App\Models\HalHome;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('halaman_home.index');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/grup', [GrupController::class, 'index'])->name('grup');
    Route::post('/grup/store', [GrupController::class, 'store'])->name('grup.store');
    Route::get('/grup/edit/{id}', [GrupController::class, 'edit'])->name('grup.edit');
    Route::post('/grup/update/{id}', [GrupController::class, 'update'])->name('grup.update');
    Route::get('/grup/destroy/{id}', [GrupController::class, 'destroy'])->name('grup.destroy');

    Route::get('/rekening', [RekeningController::class, 'index'])->name('rekening');
    Route::post('/rekening/store', [RekeningController::class, 'store'])->name('rekening.store');
    Route::get('/rekening/edit/{id}', [RekeningController::class, 'edit'])->name('rekening.edit');
    Route::post('/rekening/update/{id}', [RekeningController::class, 'update'])->name('rekening.update');
    Route::get('/rekening/destroy/{id}', [RekeningController::class, 'destroy'])->name('rekening.destroy');

    Route::get('/lembaga', [LembagaController::class, 'index'])->name('lembaga');
    Route::get('/lembaga/create', [LembagaController::class, 'create'])->name('lembaga.create');
    Route::post('/lembaga/store', [LembagaController::class, 'store'])->name('lembaga.store');
    Route::get('/lembaga/edit/{id}', [LembagaController::class, 'edit'])->name('lembaga.edit');
    Route::post('/lembaga/update/{id}', [LembagaController::class, 'update'])->name('lembaga.update');
    Route::get('/lembaga/destroy/{id}', [LembagaController::class, 'destroy'])->name('lembaga.destroy');

    Route::get('/donatur', [DonaturController::class, 'index'])->name('donatur');
    Route::get('/donatur/create', [DonaturController::class, 'create'])->name('donatur.create');
    Route::post('/donatur/store', [DonaturController::class, 'store'])->name('donatur.store');
    Route::get('/donatur/edit/{id}', [DonaturController::class, 'edit'])->name('donatur.edit');
    Route::post('/donatur/update/{id}', [DonaturController::class, 'update'])->name('donatur.update');
    Route::get('/donatur/destroy/{id}', [DonaturController::class, 'destroy'])->name('donatur.destroy');
    Route::get('donatur/export_excel', [DonaturController::class, 'donaturExcel'])->name('donatur.export-excel');

    Route::get('/prog_penerimaan', [ProgramController::class, 'index'])->name('program');
    Route::get('/prog_penerimaan/create', [ProgramController::class, 'create'])->name('program.create');
    Route::post('/prog_penerimaan/store', [ProgramController::class, 'store'])->name('program.store');
    Route::get('/prog_penerimaan/edit/{id}', [ProgramController::class, 'edit'])->name('program.edit');
    Route::post('/prog_penerimaan/update/{id}', [ProgramController::class, 'update'])->name('program.update');
    Route::get('/prog_penerimaan/destroy/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');

    Route::get('/relawan', [RelawanController::class, 'index'])->name('relawan');
    Route::get('/relawan/create', [RelawanController::class, 'create'])->name('relawan.create');
    Route::post('relawan/store', [RelawanController::class, 'store'])->name('relawan.store');
    Route::get('/relawan/edit/{id}', [RelawanController::class, 'edit'])->name('relawan.edit');
    Route::post('relawan/update/{id}', [RelawanController::class, 'update'])->name('relawan.update');
    Route::get('/relawan/destroy/{id}', [RelawanController::class, 'destroy'])->name('relawan.destroy');
    Route::get('/manage-users', [RelawanController::class, 'index1'])->name('user');
    Route::get('/manage-users/create', [RelawanController::class, 'create1'])->name('user.create');
    Route::post('manage-users/store', [RelawanController::class, 'store1'])->name('user.store');
    Route::get('/manage-users/edit/{id}', [RelawanController::class, 'edit1'])->name('user.edit');
    Route::post('manage-users/update/{id}', [RelawanController::class, 'update1'])->name('user.update');
   
    Route::get('/penerimaan', [PenerimaanController::class, 'index'])->name('penerimaan');
    Route::get('/penerimaan/by_donatur', [PenerimaanController::class, 'penerimaanByDonatur'])->name('penerimaanByDonatur');
    Route::get('/penerimaan/create', [PenerimaanController::class, 'create'])->name('penerimaan.create');
    Route::post('penerimaan/store', [PenerimaanController::class, 'store'])->name('penerimaan.store');
    Route::get('/penerimaan/edit/{id}', [PenerimaanController::class, 'edit'])->name('penerimaan.edit');
    Route::post('penerimaan/update/{id}', [PenerimaanController::class, 'update'])->name('penerimaan.update');
    Route::get('/penerimaan/destroy/{id}', [PenerimaanController::class, 'destroy'])->name('penerimaan.destroy');
    Route::get('penerimaan/{id}/print-sertifikat', [PenerimaanController::class, 'printSertifikat'])->name('penerimaan.print-sertifikat');
    Route::get('penerimaan/{id}/print-kwitansi', [PenerimaanController::class, 'printKwitansi'])->name('penerimaan.print-kwitansi');
    Route::get('penerimaan/{id}/riwayat-transaksi', [PenerimaanController::class, 'printTransaksi'])->name('penerimaan.riwayat-transaksi');
    Route::get('penerimaan/export_excel', [PenerimaanController::class, 'exportExcel'])->name('penerimaan.export-excel');
    Route::get('penerimaan/export_excel/by_Program', [PenerimaanController::class, 'exportExcel2'])->name('penerimaanByProgram.export-excel');
    Route::get('penerimaan/export_excel/by_tgl', [PenerimaanController::class, 'exportExcel3'])->name('penerimaanByTgl.export-excel');

    Route::get('/relasi', [RelasiController::class, 'index'])->name('relasi');
    Route::get('/relasi/create', [RelasiController::class, 'create'])->name('relasi.create');
    Route::post('relasi/store', [RelasiController::class, 'store'])->name('relasi.store');
    Route::get('/relasi/edit/{id}', [RelasiController::class, 'edit'])->name('relasi.edit');
    Route::post('relasi/update/{id}', [RelasiController::class, 'update'])->name('relasi.update');
    Route::get('/relasi/destroy/{id}', [RelasiController::class, 'destroy'])->name('relasi.destroy');

    Route::get('/home_admin', [HalHomeController::class, 'index'])->name('home_admin');
    Route::get('/home_admin/create', [HalHomeController::class, 'create'])->name('home_admin.create');
    Route::post('home_admin/store', [HalHomeController::class, 'store'])->name('home_admin.store');
    Route::post('home_admin/store2', [HalHomeController::class, 'store2'])->name('home_admin.store2');
    Route::post('home_admin/store3', [HalHomeController::class, 'store3'])->name('home_admin.store3');
    Route::get('/home_admin/edit/{id}', [HalHomeController::class, 'edit'])->name('home_admin.edit');
    Route::get('/home_admin/edit2/{id}', [HalHomeController::class, 'edit2'])->name('home_admin.edit2');
    Route::get('/home_admin/edit3/{id}', [HalHomeController::class, 'edit3'])->name('home_admin.edit3');
    Route::post('home_admin/update/{id}', [HalHomeController::class, 'update'])->name('home_admin.update');
    Route::post('home_admin/update2/{id}', [HalHomeController::class, 'update2'])->name('home_admin.update2');
    Route::post('home_admin/update3/{id}', [HalHomeController::class, 'update3'])->name('home_admin.update3');
    Route::get('/home_admin/destroy/{id}', [HalHomeController::class, 'destroy'])->name('home_admin.destroy');
    Route::get('/home_admin/destroy2/{id}', [HalHomeController::class, 'destroy2'])->name('home_admin.destroy2');
    Route::get('/home_admin/destroy3/{id}', [HalHomeController::class, 'destroy3'])->name('home_admin.destroy3');

    Route::get('/berita_admin', [BeritaController::class, 'index'])->name('berita_admin');
    Route::get('/berita_admin/create', [BeritaController::class, 'create'])->name('berita_admin.create');
    Route::post('berita_admin/store', [BeritaController::class, 'store'])->name('berita_admin.store');
    Route::get('/berita_admin/edit/{id}', [BeritaController::class, 'edit'])->name('berita_admin.edit');
    Route::post('berita_admin/update/{id}', [BeritaController::class, 'update'])->name('berita_admin.update');
    Route::get('/berita_admin/destroy/{id}', [BeritaController::class, 'destroy'])->name('berita_admin.destroy');

    Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign');
    Route::get('/campaign/create', [CampaignController::class, 'create'])->name('campaign.create');
    Route::post('campaign/store', [CampaignController::class, 'store'])->name('campaign.store');
    Route::get('/campaign/edit/{id}', [CampaignController::class, 'edit'])->name('campaign.edit');
    Route::post('campaign/update/{id}', [CampaignController::class, 'update'])->name('campaign.update');
    Route::get('/campaign/destroy/{id}', [CampaignController::class, 'destroy'])->name('campaign.destroy');

    Route::get('/download', [DownloadController::class, 'index'])->name('download');
    Route::get('/download/create', [DownloadController::class, 'create'])->name('download.create');
    Route::post('download/store', [DownloadController::class, 'store'])->name('download.store');
    Route::get('/download/edit/{id}', [DownloadController::class, 'edit'])->name('download.edit');
    Route::post('download/update/{id}', [DownloadController::class, 'update'])->name('download.update');
    Route::get('/download/destroy/{id}', [DownloadController::class, 'destroy'])->name('download.destroy');

    Route::get('/tentang', [TentangController::class, 'index'])->name('tentang_admin');
    Route::get('/tentang/create', [TentangController::class, 'create'])->name('tentang.create');
    Route::post('/tentang/store', [TentangController::class, 'store'])->name('tentang.store');
    Route::get('/tentang/edit/{id}', [TentangController::class, 'edit'])->name('tentang.edit');
    Route::post('/tentang/update/{id}', [TentangController::class, 'update'])->name('tentang.update');
    Route::get('/tentang/destroy/{id}', [TentangController::class, 'destroy'])->name('tentang.destroy');

    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::get('/profil/create', [ProfilController::class, 'create'])->name('profil.create');
    Route::post('/profil/store', [ProfilController::class, 'store'])->name('profil.store');
    Route::get('/profil/edit/{id}', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update/{id}', [ProfilController::class, 'update'])->name('profil.update');
    Route::get('/profil/destroy/{id}', [ProfilController::class, 'destroy'])->name('profil.destroy');

    Route::get('/visi', [VisiController::class, 'index'])->name('visi');
    Route::get('/visi/create', [VisiController::class, 'create'])->name('visi.create');
    Route::post('/visi/store', [VisiController::class, 'store'])->name('visi.store');
    Route::get('/visi/edit/{id}', [VisiController::class, 'edit'])->name('visi.edit');
    Route::post('/visi/update/{id}', [VisiController::class, 'update'])->name('visi.update');
    Route::get('/visi/destroy/{id}', [VisiController::class, 'destroy'])->name('visi.destroy');

    Route::get('/nazhir', [NazhirController::class, 'index'])->name('nazhir');
    Route::get('/nazhir/create', [NazhirController::class, 'create'])->name('nazhir.create');
    Route::post('/nazhir/store', [NazhirController::class, 'store'])->name('nazhir.store');
    Route::get('/nazhir/edit/{id}', [NazhirController::class, 'edit'])->name('nazhir.edit');
    Route::post('/nazhir/update/{id}', [NazhirController::class, 'update'])->name('nazhir.update');
    Route::get('/nazhir/destroy/{id}', [NazhirController::class, 'destroy'])->name('nazhir.destroy');

    Route::get('/struktur', [StrukturController::class, 'index'])->name('struktur');
    Route::get('/struktur/create', [StrukturController::class, 'create'])->name('struktur.create');
    Route::post('/struktur/store', [StrukturController::class, 'store'])->name('struktur.store');
    Route::get('/struktur/edit/{id}', [StrukturController::class, 'edit'])->name('struktur.edit');
    Route::post('/struktur/update/{id}', [StrukturController::class, 'update'])->name('struktur.update');
    Route::get('/struktur/destroy/{id}', [StrukturController::class, 'destroy'])->name('struktur.destroy');
});

// Route::get('/login', [LoginController::class, 'index'])->name('login');
Auth::routes();

Route::get('/', [HalHomeController::class, 'index1'])->name('web');

Route::get('/berita', [BeritaController::class, 'index1'])->name('berita');
Route::get('/berita/show/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/program', [CampaignController::class, 'index1'])->name('program_web');
Route::get('/program/show/{id}', [CampaignController::class, 'show'])->name('program.show');
Route::get('/download-berkas-ssf', [DownloadController::class, 'index1'])->name('halaman_download');
Route::get('/profil-ssf', [TentangController::class, 'index1'])->name('tentang');
// Route::get('/visi-misi-legalitas-ssf', [TentangController::class, 'index1'])->name('visi');
Route::get('/donasi-ssf', [DonasiController::class, 'index'])->name('donasi');
Route::get('/donasi-ssf/{id}', [DonasiController::class, 'index1'])->name('donasi2');
Route::post('donasi-ssf/store', [DonasiController::class, 'store'])->name('donasi.store');
Route::get('/tentang-kami/{id}', [TentangController::class, 'index1'])->name('tentang.index1');
