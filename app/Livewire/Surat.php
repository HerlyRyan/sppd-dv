<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Surat extends Component
{
    public $jenis_surat;

    public $judul_surat;

    public $tanggal_surat;

    public $ketua_tim_pelaksana;

    public $pejabat_pembuat_komitmen;

    public $bendahara;

    public $untuk_pembayaran;

    public $selected_employees = [];

    public function generatePdf()
    {
        $this->validate([
            'jenis_surat'       => 'required',
            'tanggal_surat'     => 'required',
        ]);

        $view = '';
        $data = [];

        $date = Carbon::parse($this->tanggal_surat);

        Carbon::setLocale('id');

        if ($this->jenis_surat == 'daftar_hadir') {
            $view = 'daftar-kehadiran';
            $title = $this->generateNomorSurat($this->jenis_surat);
            $nama_surat = 'DAFTAR HADIR_SOSIALISASI_' . $title;

            $this->validate([
                'judul_surat'           => 'required',
                'ketua_tim_pelaksana'   => 'required',
                'selected_employees'    => 'required'
            ]);

            $ketua_tim_pelaksana = Employee::where('id', $this->ketua_tim_pelaksana)->first();

            $selectedEmployees = Employee::whereIn('id', $this->selected_employees)->get();

            $data = [
                'judul_surat'           => $this->judul_surat,
                'tanggal_surat'         => $date,
                'employees'             => $selectedEmployees,
                'ketua_tim_pelaksana'   => $ketua_tim_pelaksana,
            ];
        } else if ($this->jenis_surat == 'daftar_nominatif') {
            $view = 'daftar-nominatif';
            $title = $this->generateNomorSurat($this->jenis_surat);
            $nama_surat = 'NOMINATIF_SOSIALISASI_' . $title;

            $this->validate([
                'judul_surat'               => 'required',
                'pejabat_pembuat_komitmen'  => 'required',
                'bendahara'                 => 'required',
                'selected_employees'        => 'required'
            ]);

            $pejabat_pembuat_komitmen = Employee::where('id', $this->pejabat_pembuat_komitmen)->first();
            $bendahara = Employee::where('id', $this->bendahara)->first();

            $selectedEmployees = Employee::whereIn('id', $this->selected_employees)->get();

            $data = [
                'judul_surat'               => $this->judul_surat,
                'tanggal_surat'             => $date,
                'employees'                 => $selectedEmployees,
                'pejabat_pembuat_komitmen'  => $pejabat_pembuat_komitmen,
                'bendahara'                 => $bendahara,
            ];
        } else if ($this->jenis_surat == 'kuitansi') {
            $view = 'kuitansi';
            $title = $this->generateNomorSurat($this->jenis_surat);
            $nama_surat = 'KUITANSI_SOSIALISASI_' . $title;

            $this->validate([
                'pejabat_pembuat_komitmen'  => 'required',
                'bendahara'                 => 'required',
                'untuk_pembayaran'          => 'required',
                'selected_employees'        => 'required'
            ]);

            $pejabat_pembuat_komitmen = Employee::where('id', $this->pejabat_pembuat_komitmen)->first();
            $bendahara = Employee::where('id', $this->bendahara)->first();

            $selectedEmployees = Employee::whereIn('id', $this->selected_employees)->get();

            $sebesar = 0;
            foreach ($selectedEmployees as $employee) {
                $sebesar += $employee->grade->gaji_pokok;
            }

            $terbilang = $this->convert($sebesar);

            $data = [
                'judul_surat'               => $this->judul_surat,
                'tanggal_surat'             => $date,
                'employees'                 => $selectedEmployees,
                'pejabat_pembuat_komitmen'  => $pejabat_pembuat_komitmen,
                'bendahara'                 => $bendahara,
                'untuk_pembayaran'          => $this->untuk_pembayaran,
                'sebesar'                   => $sebesar,
                'terbilang'                 => $terbilang,
                'no_surat'                  => $title,
            ];
        }

        DB::table('surat')
            ->insert([
                'no_surat'      => $title,
                'tanggal_surat' => $date,
                'jenis_surat'   => $this->jenis_surat,
                'nama_file'     => "$nama_surat.pdf",
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

        $pdf = Pdf::loadView($view, $data);

        Storage::disk('public')->put("surat/$nama_surat.pdf", $pdf->output());

        $this->reset();

        return response()->download(storage_path("app/public/surat/$nama_surat.pdf"));
    }

    public function convert($x)
    {
        $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        if ($x < 12)
            return $abil[$x];
        elseif ($x < 20)
            return Surat::convert($x - 10) . " belas ";
        elseif ($x < 100)
            return Surat::convert($x / 10) . " puluh " . Surat::convert($x % 10);
        elseif ($x < 200)
            return " seratus " . Surat::convert($x - 100);
        elseif ($x < 1000)
            return Surat::convert($x / 100) . " ratus " . Surat::convert($x % 100);
        elseif ($x < 2000)
            return " seribu " . Surat::convert($x - 1000);
        elseif ($x < 1000000)
            return Surat::convert($x / 1000) . " ribu " . Surat::convert($x % 1000);
        elseif ($x < 1000000000)
            return Surat::convert($x / 1000000) . " juta " . Surat::convert($x % 1000000);
    }

    public function generateNomorSurat($jenis_surat)
    {
        $tahun = Carbon::now()->year;

        $lastSurat = DB::table('surat')
            ->where('jenis_surat', $jenis_surat)
            ->whereYear('tanggal_surat', $tahun)
            ->orderBy('no_surat', 'desc')
            ->first();

        switch ($jenis_surat) {
            case 'daftar_hadir':
                $prefix = 'DA';
                break;
            case 'daftar_nominatif':
                $prefix = 'DN';
                break;
            case 'kuitansi':
                $prefix = 'KT';
                break;
            default:
                $prefix = '';
        }

        $nomor_urut = $lastSurat ? (int)substr($lastSurat->no_surat, -3) + 1 : 1;

        $no_surat = $prefix . '-' . $tahun . '-' . str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);

        return $no_surat;
    }

    public function render()
    {
        $employees = Employee::where('status', 'aktif')->get();

        return view('livewire.surat', compact(
            'employees'
        ));
    }
}
