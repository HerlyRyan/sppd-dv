<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SkpReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function indexPegawai(Request $request)
    {
        $search = $request->input('search');

        $items = Employee::with(['position', 'grade'])
            ->when($search, function ($query, $search) {
                $query->where('nama_pegawai', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        return view('report.pegawai.index', compact('items'));
    }

    public function printPegawai(Request $request)
    {
        $search = $request->input('search');

        $items = Employee::with(['position', 'grade'])
            ->when($search, function ($query, $search) {
                $query->where('nama_pegawai', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('report.pegawai.print', compact('items'));
    }

    public function indexSKP()
    {
        $submittedIds = SkpReport::pluck('pegawai_id')->toArray();

        // Pegawai yang sudah mengumpulkan SKP (gunakan query builder)
        $sudahMengumpulkan = Employee::with(['position', 'agency', 'unit_kerja'])
            ->whereIn('id', $submittedIds)
            ->paginate(5, ['*'], 'sudah'); // Gunakan query param 'sudah' agar tidak bentrok

        // Pegawai yang belum mengumpulkan SKP (gunakan query builder)
        $belumMengumpulkan = Employee::with(['position', 'agency', 'unit_kerja'])
            ->whereNotIn('id', $submittedIds)
            ->paginate(5, ['*'], 'belum');

        return view('report.skp.index', compact('sudahMengumpulkan', 'belumMengumpulkan'));
    }

    public function printSKP()
    {
        $allEmployees = Employee::with(['position', 'agency', 'unit_kerja'])->get();
        $submittedIds = SkpReport::pluck('pegawai_id')->toArray();

        $sudahMengumpulkan = $allEmployees->whereIn('id', $submittedIds);
        $belumMengumpulkan = $allEmployees->whereNotIn('id', $submittedIds);

        // View cetak bisa berupa blade biasa atau langsung di-export ke PDF
        return view('report.skp.print', compact('sudahMengumpulkan', 'belumMengumpulkan'));
    }

    public function grafikSKPAntarPegawai(Request $request)
    {
        // Ambil list tahun dari skp_reports (dari field created_at atau transaction_date, sesuaikan)
        $tahunList = DB::table('skp_reports')
            ->selectRaw('YEAR(created_at) as tahun')
            ->groupByRaw('YEAR(created_at)')
            ->orderByDesc('tahun')
            ->pluck('tahun');

        // Ambil filter tahun jika ada
        $tahun = $request->tahun;

        $data = DB::table('skp_reports as s')
            ->join('employees as e', 's.pegawai_id', '=', 'e.id')
            ->join('positions as p', 'e.position_id', '=', 'p.id')
            ->join('agencies as a', 'e.agency_id', '=', 'a.id')
            ->when($tahun, function ($query) use ($tahun) {
                $query->whereYear('s.created_at', $tahun); // atau 's.transaction_date' jika pakai field itu
            })
            ->select(
                'e.nama_pegawai',
                'p.nama_jabatan',
                'a.instansi as unit_kerja',
                DB::raw('COUNT(s.id) as total_skp')
            )
            ->groupBy('e.id', 'e.nama_pegawai', 'p.nama_jabatan', 'a.instansi')
            ->get();

        return view('report.grafik_skp.index', compact('data', 'tahunList'));
    }

    public function printGrafikSKPAntarPegawai(Request $request)
    {
        // Ambil filter tahun jika ada
        $tahun = $request->tahun;

        $data = DB::table('skp_reports as s')
            ->join('employees as e', 's.pegawai_id', '=', 'e.id')
            ->join('positions as p', 'e.position_id', '=', 'p.id')
            ->join('agencies as a', 'e.agency_id', '=', 'a.id')
            ->when($tahun, function ($query) use ($tahun) {
                $query->whereYear('s.created_at', $tahun); // atau 's.transaction_date' jika pakai field itu
            })
            ->select(
                'e.nama_pegawai',
                'p.nama_jabatan',
                'a.instansi as unit_kerja',
                DB::raw('COUNT(s.id) as total_skp')
            )
            ->groupBy('e.id', 'e.nama_pegawai', 'p.nama_jabatan', 'a.instansi')
            ->get();


        return view('report.grafik_skp.print', compact('data'));
    }

    // Ringkasan Kinerja per Unit Kerja
    public function ringkasanKinerjaPerUnit()
    {
        $data = DB::table('skp_reports as s')
            ->join('employees as e', 's.pegawai_id', '=', 'e.id')
            ->join('agencies as a', 'e.agency_id', '=', 'a.id')
            ->select(
                'a.instansi as unit_kerja',
                DB::raw('COUNT(s.id) as total_skp'),
                DB::raw("SUM(CASE WHEN s.status = 'approved' THEN 1 ELSE 0 END) as skp_disetujui"),
                DB::raw("SUM(CASE WHEN s.status = 'rejected' THEN 1 ELSE 0 END) as skp_ditolak"),
                DB::raw("SUM(CASE WHEN s.status = 'pending' THEN 1 ELSE 0 END) as skp_menunggu")
            )
            ->groupBy('a.instansi')
            ->get();

        return view('report.ringkasan_kinerja.index', compact('data'));
    }

    public function printRingkasanKinerjaPerUnit()
    {
        $data = DB::table('skp_reports as s')
            ->join('employees as e', 's.pegawai_id', '=', 'e.id')
            ->join('agencies as a', 'e.agency_id', '=', 'a.id')
            ->select(
                'a.instansi as unit_kerja',
                DB::raw('COUNT(s.id) as total_skp'),
                DB::raw("SUM(CASE WHEN s.status = 'approved' THEN 1 ELSE 0 END) as skp_disetujui"),
                DB::raw("SUM(CASE WHEN s.status = 'rejected' THEN 1 ELSE 0 END) as skp_ditolak"),
                DB::raw("SUM(CASE WHEN s.status = 'pending' THEN 1 ELSE 0 END) as skp_menunggu")
            )
            ->groupBy('a.instansi')
            ->get();

        return view('report.ringkasan_kinerja.print', compact('data'));
    }

    // Laporan Kehadiran Pegawai Tahunan (berdasarkan SPPD)
    public function kehadiranTahunan(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));

        $data = DB::table('sppds as s')
            ->join('employees as e', 's.employee_id', '=', 'e.id')
            ->join('agencies as a', 'e.agency_id', '=', 'a.id')
            ->whereYear('s.tanggal_berangkat', $tahun)
            ->select(
                'e.nama_pegawai',
                'a.instansi as unit_kerja',
                DB::raw('COUNT(s.id) as jumlah_sppd'),
                DB::raw('SUM(DATEDIFF(s.tanggal_kembali, s.tanggal_berangkat) + 1) as total_hari_hadir')
            )
            ->groupBy('e.id', 'e.nama_pegawai', 'a.instansi')
            ->get();


        return view('report.kehadiran_tahunan.index', compact('data', 'tahun'));
    }
    public function printKehadiranTahunan(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));

        $data = DB::table('sppds as s')
            ->join('employees as e', 's.employee_id', '=', 'e.id')
            ->join('agencies as a', 'e.agency_id', '=', 'a.id')
            ->whereYear('s.tanggal_berangkat', $tahun)
            ->select(
                'e.nama_pegawai',
                'a.instansi as unit_kerja',
                DB::raw('COUNT(s.id) as jumlah_sppd'),
                DB::raw('SUM(DATEDIFF(s.tanggal_kembali, s.tanggal_berangkat) + 1) as total_hari_hadir')
            )
            ->groupBy('e.id', 'e.nama_pegawai', 'a.instansi')
            ->get();

        return view('report.kehadiran_tahunan.print', compact('data', 'tahun'));
    }


    public function sppdPerBulan(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));

        $data = DB::table('sppds')
            ->selectRaw('MONTH(tanggal_berangkat) as bulan, COUNT(id) as total_sppd')
            ->whereYear('tanggal_berangkat', $tahun)
            ->groupBy(DB::raw('MONTH(tanggal_berangkat)'))
            ->orderBy('bulan')
            ->get();

        return view('report.sppd_per_bulan.index', compact('data', 'tahun'));
    }

    public function printSppdPerBulan(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));

        $data = DB::table('sppds')
            ->selectRaw('MONTH(tanggal_berangkat) as bulan, COUNT(id) as total_sppd')
            ->whereYear('tanggal_berangkat', $tahun)
            ->groupBy(DB::raw('MONTH(tanggal_berangkat)'))
            ->orderBy('bulan')
            ->get();

        return view('report.sppd_per_bulan.print', compact('data', 'tahun'));
    }
}
