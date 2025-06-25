<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SkpReport;
use App\Models\SkpIndicator;
use Illuminate\Database\Seeder;

class SkpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skp = SkpReport::create([
            'nama_pegawai' => 'ETTY FARIDA YANTI, SE',
            'nip_pegawai' => '197511282007012009',
            'pangkat_pegawai' => 'Penata Muda / III/a',
            'jabatan_pegawai' => 'PENGELOLA PERLINDUNGAN SOSIAL',
            'unit_kerja_pegawai' => 'SEKSI KESEJAHTERAAN SOSIAL',
            'nama_penilai' => 'MASPAH, SE',
            'nip_penilai' => '196801022007012033',
            'pangkat_penilai' => 'Penata / III/c',
            'jabatan_penilai' => 'KEPALA SEKSI KESEJAHTERAAN SOSIAL',
            'unit_kerja_penilai' => 'SEKSI KESEJAHTERAAN SOSIAL',
            'periode_mulai' => '2024-01-01',
            'periode_selesai' => '2024-12-31',
        ]);

        $skp->indicators()->createMany([
            [
                'kategori' => 'utama',
                'rencana_kerja' => 'Terlaksananya Pelayanan Kesejahteraan Sosial di Wilayah Kelurahan',
                'aspek' => 'Kuantitas',
                'indikator' => 'Jumlah Dokumen Pelayanan Kesejahteraan Sosial',
                'target' => '1 Dokumen',
            ],
            [
                'kategori' => 'utama',
                'rencana_kerja' => 'Tersediannya Data dan Informasi Pelayanan Kesejahteraan Sosial',
                'aspek' => 'Kualitas',
                'indikator' => 'Persentase Jumlah Pelayanan Kesejahteraan Sosial',
                'target' => '100%',
            ],
            [
                'kategori' => 'utama',
                'rencana_kerja' => 'Ketepatan Waktu Pelaksanaan',
                'aspek' => 'Waktu',
                'indikator' => 'Pelaksanaan Tepat Waktu',
                'target' => '1 Bulan',
            ],
        ]);
    }
}
