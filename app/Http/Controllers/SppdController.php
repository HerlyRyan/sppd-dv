<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Sppd;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SppdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sppd.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        return view('sppd.create', [
            'employees' => Employee::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id'       => 'required',
            'nomor_surat'       => 'required|unique:sppds',
            'tanggal_surat'     => 'required',
            'tujuan_sppd'       => 'required',
            'transportasi'      => 'required',
            'tempat_berangkat'  => 'required',
            'tempat_tujuan'     => 'required',
            'durasi_sppd'       => 'required',
            'tanggal_berangkat' => 'required',
            'tanggal_kembali'   => 'required',
            'pejabat_pembuat_komitmen' => 'required',
            'biaya_sppd'        => 'required',
        ]);

        Sppd::create($validated);

        return redirect()->route('sppd.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sppd $sppd) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sppd $sppd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sppd $sppd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sppd $sppd)
    {
        $sppd->delete();

        return redirect()->route('sppd.index')->with('success', 'Surat berhasil dihapus');
    }

    public function buat_surat(Sppd $sppd)
    {
        $data = [
            'tanggal_surat'         => Carbon::parse($sppd->tanggal_surat),
            'sppd'                  => $sppd
        ];

        $pdf = Pdf::loadView('sppd.sppd', $data);

        $nomor_surat = str_replace('/', '_', $sppd->nomor_surat);

        Storage::disk('public')->put("surat/$nomor_surat.pdf", $pdf->output());

        $sppd->update([
            'flag_buat_surat' => 'Y'
        ]);

        return redirect()->route('sppd.index')->with('success', 'Surat berhasil disimpan');
    }

    public function download_surat(Sppd $sppd)
    {
        $data = [
            'tanggal_surat'         => Carbon::parse($sppd->tanggal_surat),
            'sppd'                  => $sppd
        ];

        $pdf = Pdf::loadView('sppd.sppd', $data);

        $nomor_surat = str_replace('/', '_', $sppd->nomor_surat);

        return $pdf->download("$nomor_surat.pdf");
    }

    public static function convert($x)
    {
        $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        if ($x < 12)
            return $abil[$x];
        elseif ($x < 20)
            return SppdController::convert($x - 10) . " belas ";
        elseif ($x < 100)
            return SppdController::convert($x / 10) . " puluh " . SppdController::convert($x % 10);
        elseif ($x < 200)
            return " seratus " . SppdController::convert($x - 100);
        elseif ($x < 1000)
            return SppdController::convert($x / 100) . " ratus " . SppdController::convert($x % 100);
        elseif ($x < 2000)
            return " seribu " . SppdController::convert($x - 1000);
        elseif ($x < 1000000)
            return SppdController::convert($x / 1000) . " ribu " . SppdController::convert($x % 1000);
        elseif ($x < 1000000000)
            return SppdController::convert($x / 1000000) . " juta " . SppdController::convert($x % 1000000);
    }

    public static function formatTanggalIndo($tanggal_str)
    {
        // Array nama bulan dalam bahasa Indonesia
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        // Membuat objek DateTime dari string
        $tanggal = new DateTime($tanggal_str);

        // Mendapatkan hari, bulan, dan tahun
        $hari = $tanggal->format('j'); // Hari tanpa angka nol di depan
        $bulan_nomor = $tanggal->format('n'); // Bulan dalam format angka (tanpa leading zero)
        $tahun = $tanggal->format('Y'); // Tahun dengan 4 digit

        // Menyusun tanggal dalam format "3 Desember 2024"
        return $hari . ' ' . $bulan[$bulan_nomor] . ' ' . $tahun;
    }

    public static function cari_nip_pejabat($nama_pejabat)
    {
        $nama_pejabat = str_replace(' ', '', $nama_pejabat);

        return DB::table('employees')
            ->where('nama_pegawai', $nama_pejabat)
            ->value('nip');
    }

    public static function total_sppd_user()
    {
        return DB::table('sppds')
            ->join('employees', 'employees.id', 'sppds.employee_id')
            ->join('users', 'users.username', 'employees.nip')
            ->where('users.id', Auth::user()->id)
            ->count();
    }
}
