<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Penerimaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenerimaanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $donatur = Penerimaan::get();
        // dd($donatur);
        foreach ($donatur as $key => $value) {
            // if(!empty($value->lembaga_id)) {        
            // return Penerimaan::join('users','penerimaan.users_id','users.id')
            //     ->join('prog_penerimaan','penerimaan.prog_penerimaan_id','prog_penerimaan.id')
            //     ->join('grup','penerimaan.grup_id','grup.id')
            //     ->join('lembaga','penerimaan.lembaga_id','lembaga.id')
            //     ->join('rekening','penerimaan.rekening_id','rekening.id')
            //     ->join('relasi','penerimaan.relasi_id','relasi.id')
            //     // ->join('donatur','donatur.donatur_id','donatur.id')
            //                 ->select('penerimaan.reff',
            //                          'penerimaan.tgl',
            //                          'penerimaan.tgl_tf',
            //                          'penerimaan.nominal',
            //                          'penerimaan.jumlah',
            //                          'users.nama as user',
            //                          'prog_penerimaan.nama as prog_penerimaan',
            //                          'grup.nama as grup',
            //                          'lembaga.nama_lembaga',
            //                          'rekening.bank',
            //                          'rekening.nama_pemilik_rekening',
            //                          'rekening.no_rek',
            //  'donatur.nama',
            //          'relasi.nama'
            // )->get();
            // } else if (!empty($value->donatur_id)) {
            // $d =Penerimaan::leftJoin('donatur','penerimaan.donatur_id','donatur.id')->select('donatur.nama')->limit(30)->get();
            // dd($d);                 
            return Penerimaan::leftJoin('users', 'penerimaan.users_id', 'users.id')
                ->leftJoin('prog_penerimaan', 'penerimaan.prog_penerimaan_id', 'prog_penerimaan.id')
                ->leftJoin('grup', 'penerimaan.grup_id', 'grup.id')
                ->leftJoin('lembaga', 'penerimaan.lembaga_id', 'lembaga.id')
                ->leftJoin('rekening', 'penerimaan.rekening_id', 'rekening.id')
                ->leftJoin('donatur', 'penerimaan.donatur_id', 'donatur.id')
                ->leftJoin('relasi', 'penerimaan.relasi_id', 'relasi.id')
                ->select(
                    'penerimaan.reff',
                    'penerimaan.tgl',
                    'penerimaan.tgl_tf',
                    DB::raw("CONCAT('http://localhost:8000/storage/',penerimaan.bukti) AS bukti"),
                    'penerimaan.jumlah',
                    'users.nama as user',
                    'prog_penerimaan.nama as prog_penerimaan',
                    'grup.nama as grup',
                    //  'lembaga.nama_lembaga',
                    'rekening.bank',
                    'rekening.nama_pemilik_rekening',
                    'rekening.no_rek',
                    'donatur.nama as donatur',
                    'donatur.hp as donatur_hp',
                    'donatur.alamat as donatur_alamat',
                    'lembaga.nama_lembaga as lembaga',
                    'lembaga.hp_lembaga as lembaga_hp',
                    'lembaga.alamat_lembaga as lembaga_alamat',
                    'relasi.nama'
                )->orderBy('penerimaan.created_at')->get();

            // }
        }
    }
    public function headings(): array
    {

        return [
            'Reff',
            'Tanggal',
            'Tanggal Bukti TF',
            'Bukti Transfer',
            'Jumlah Total',
            'Nama Relawan',
            'Program Penerimaan',
            'Grup',
            'Nama Bank',
            'Nama Rekening',
            'No Rekening',
            'Nama Donatur Personal',
            'No HP Donatur Personal',
            'Alamat Donatur Personal',
            'Nama Lembaga',
            'No HP Lembaga Personal',
            'Alamat Lembaga Personal',
            'Nama Relasi'
        ];
    }
}
