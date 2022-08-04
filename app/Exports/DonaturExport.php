<?php

namespace App\Exports;

use App\Models\Donatur;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DonaturExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Donatur::select(
            'kode',
            'nama',
            'hp',
            'email',
            'npwp',
            'npwz',
            'ktp',
            'tmptlhr',
            'tgllhr',
            'jk',
            'alamat',
            'kelurahan',
            'kecamatan',
            'kota',
            'provinsi',
            'kdpos',
            'negara'
        )->orderBy('created_at')->get();
    }

    public function headings(): array
    {
        return [
            'Kode',
            'Nama Donatur',
            'No HP Donatur',
            'Email Donatur',
            'NPWP Donatur',
            'NPWZ Donatur',
            'No KTP',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'Kelurahan',
            'Kecamatan',
            'Kota',
            'Provinsi',
            'Kode Pos',
            'Negara',
        ];
    }
}
