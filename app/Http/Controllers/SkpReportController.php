<?php

namespace App\Http\Controllers;

use App\Models\Position; // Menggunakan model Position sesuai kode Anda
use App\Models\SkpReport;
use App\Models\Employee; // Menggunakan model Employee untuk pegawai dan penilai
use App\Models\WorkResult;
use App\Models\PerformanceIndicator;
use App\Models\WorkBehavior;
use App\Models\SupportingResource;
use App\Models\Accountability;
use App\Models\Consequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Digunakan untuk transaksi database
use Barryvdh\DomPDF\Facade\Pdf;

class SkpReportController extends Controller
{
    /**
     * Menampilkan daftar laporan SKP.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $skpReports = SkpReport::with([
            'pegawai.position',
            'penilai.position',
            'workResults.performanceIndicators',
            'workBehaviors',
            'supportingResources',
            'accountabilities',
            'consequences'
        ])->get();

        return view('skp_reports.index', compact('skpReports'));
    }

    /**
     * Menampilkan formulir untuk membuat laporan SKP baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Mendapatkan ID posisi yang mengandung kata "KETUA"
        $kepalaPosisiIds = Position::where('nama_jabatan', 'LIKE', '%KETUA%')->pluck('id');

        // Mengambil daftar pegawai yang BUKAN berjabatan "KETUA"
        $pegawaiOptions = Employee::whereNotIn('position_id', $kepalaPosisiIds)
            ->with('position') // Eager load position untuk ditampilkan di view
            ->orderBy('nama_pegawai') // Menggunakan 'nama_pegawai' sesuai model Employee yang diberikan
            ->get();

        // Mengambil daftar pegawai yang adalah "KETUA" (sebagai penilai)
        $penilaiOptions = Employee::whereIn('position_id', $kepalaPosisiIds)
            ->with('position') // Eager load position untuk ditampilkan di view
            ->orderBy('nama_pegawai') // Menggunakan 'nama_pegawai' sesuai model Employee yang diberikan
            ->get();

        return view('skp_reports.create', compact('pegawaiOptions', 'penilaiOptions'));
    }

    /**
     * Menyimpan laporan SKP yang baru dibuat ke penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Mendapatkan ID posisi yang mengandung kata "KETUA"
        $kepalaPosisiIds = Position::where('nama_jabatan', 'LIKE', '%KETUA%')->pluck('id');

        $validatedData = $request->validate([
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date|after_or_equal:periode_mulai',
            'tanggal_penilaian' => 'required|date',
            'pegawai_id' => 'required|exists:employees,id',
            'penilai_id' => 'required|exists:employees,id', // Validasi ke tabel 'employees' karena penilai juga dari model Employee

            'work_results' => 'required|array|min:1',
            'work_results.*.type' => 'required|in:utama,tambahan',
            'work_results.*.rencana_hasil_kerja_pimpinan' => 'nullable|string|max:1000',
            'work_results.*.rencana_hasil_kerja' => 'required|string|max:1000',
            'work_results.*.performance_indicators' => 'required|array|min:1',
            'work_results.*.performance_indicators.*.aspek' => 'required|string|max:255',
            'work_results.*.performance_indicators.*.indikator_kinerja_individu' => 'required|string|max:1000',
            'work_results.*.performance_indicators.*.target' => 'required|string|max:255',

            'work_behaviors' => 'required|array|min:1',
            'work_behaviors.*.perilaku_kerja' => 'required|string|max:255',
            'work_behaviors.*.deskripsi_perilaku' => 'nullable|string|max:1000',
            'work_behaviors.*.ekspektasi_pimpinan' => 'required|string|max:1000',

            'resource_names' => 'nullable|string|max:2000',
            'accountability_description' => 'nullable|string|max:2000',
            'consequence_description' => 'nullable|string|max:2000',
        ]);

        $pegawai = Employee::with('position')->find($validatedData['pegawai_id']);
        $penilai = Employee::with('position')->find($validatedData['penilai_id']); // Menggunakan Employee untuk penilai juga

        if ($pegawai && in_array($pegawai->position_id, $kepalaPosisiIds->toArray())) {
            return back()->withErrors(['pegawai_id' => 'Pegawai yang dinilai tidak boleh berjabatan Kepala.'])->withInput();
        }

        if ($penilai && !in_array($penilai->position_id, $kepalaPosisiIds->toArray())) {
            return back()->withErrors(['penilai_id' => 'Penilai harus berjabatan Kepala.'])->withInput();
        }

        DB::beginTransaction();
        try {
            $skpReport = SkpReport::create([
                'pegawai_id' => $validatedData['pegawai_id'],
                'penilai_id' => $validatedData['penilai_id'],
                'periode_mulai' => $validatedData['periode_mulai'],
                'periode_selesai' => $validatedData['periode_selesai'],
                'tanggal_penilaian' => $validatedData['tanggal_penilaian'],
            ]);

            // Menyimpan Hasil Kerja dan Indikator Kinerjanya
            foreach ($validatedData['work_results'] as $wrData) {
                $workResult = $skpReport->workResults()->create([
                    'type' => $wrData['type'],
                    'rencana_hasil_kerja_pimpinan' => $wrData['rencana_hasil_kerja_pimpinan'] ?? null,
                    'rencana_hasil_kerja' => $wrData['rencana_hasil_kerja'],
                ]);

                foreach ($wrData['performance_indicators'] as $piData) {
                    $workResult->performanceIndicators()->create([
                        'aspek' => $piData['aspek'],
                        'indikator_kinerja_individu' => $piData['indikator_kinerja_individu'],
                        'target' => $piData['target'],
                    ]);
                }
            }

            // Menyimpan Perilaku Kerja
            foreach ($validatedData['work_behaviors'] as $wbData) {
                $skpReport->workBehaviors()->create([
                    'perilaku_kerja' => $wbData['perilaku_kerja'],
                    'deskripsi_perilaku' => $wbData['deskripsi_perilaku'] ?? null,
                    'ekspektasi_pimpinan' => $wbData['ekspektasi_pimpinan'],
                ]);
            }

            // Menyimpan Dukungan Sumber Daya
            if (!empty($validatedData['resource_names'])) {
                $resources = array_map('trim', explode(',', $validatedData['resource_names']));
                foreach ($resources as $resourceName) {
                    if (!empty($resourceName)) {
                        $skpReport->supportingResources()->create([
                            'resource_name' => $resourceName,
                        ]);
                    }
                }
            }

            // Menyimpan Pertanggungjawaban
            if (!empty($validatedData['accountability_description'])) {
                $skpReport->accountabilities()->create([
                    'description' => $validatedData['accountability_description'],
                ]);
            }

            // Menyimpan Konsekuensi
            if (!empty($validatedData['consequence_description'])) {
                $skpReport->consequences()->create([
                    'description' => $validatedData['consequence_description'],
                ]);
            }

            DB::commit();
            return redirect()->route('skp.index')->with('success', 'Laporan SKP berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Gagal menyimpan laporan SKP. Pesan kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Menampilkan detail laporan SKP tertentu.
     *
     * @param  \App\Models\SkpReport  $skpReport
     * @return \Illuminate\View\View
     */
    public function show(SkpReport $skpReport)
    {
        $skpReport->load([
            'pegawai.position',
            'penilai.position',
            'workResults.performanceIndicators',
            'workBehaviors',
            'supportingResources',
            'accountabilities',
            'consequences'
        ]);

        return view('skp_reports.show', compact('skpReport'));
    }

    /**
     * Menampilkan formulir untuk mengedit laporan SKP tertentu.
     *
     * @param  \App\Models\SkpReport  $skpReport
     * @return \Illuminate\View\View
     */
    public function edit(SkpReport $skpReport)
    {
        // Muat semua relasi yang diperlukan untuk mengisi formulir edit
        $skpReport->load([
            'pegawai.position',
            'penilai.position',
            'workResults.performanceIndicators',
            'workBehaviors',
            'supportingResources',
            'accountabilities',
            'consequences'
        ]);        

        // Mendapatkan ID posisi yang mengandung kata "KETUA"
        $kepalaPosisiIds = Position::where('nama_jabatan', 'LIKE', '%KETUA%')->pluck('id');

        // Mengambil daftar pegawai yang BUKAN berjabatan "KETUA"
        $pegawaiOptions = Employee::whereNotIn('position_id', $kepalaPosisiIds)
            ->with('position')
            ->orderBy('nama_pegawai')
            ->get();

        // Mengambil daftar pegawai yang adalah "KETUA" (sebagai penilai)
        $penilaiOptions = Employee::whereIn('position_id', $kepalaPosisiIds)
            ->with('position')
            ->orderBy('nama_pegawai')
            ->get();

        return view('skp_reports.edit', compact('skpReport', 'pegawaiOptions', 'penilaiOptions'));
    }

    /**
     * Memperbarui laporan SKP tertentu di penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SkpReport  $skpReport
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, SkpReport $skpReport)
    {
        // Mendapatkan ID posisi yang mengandung kata "KETUA"
        $kepalaPosisiIds = Position::where('nama_jabatan', 'LIKE', '%KETUA%')->pluck('id');

        $validatedData = $request->validate([
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date|after_or_equal:periode_mulai',
            'tanggal_penilaian' => 'required|date',
            'pegawai_id' => 'required|exists:employees,id',
            'penilai_id' => 'required|exists:employees,id',

            // Validasi untuk data relasi bisa disesuaikan jika ingin lebih ketat
            'work_results' => 'required|array|min:1',
            'work_results.*.type' => 'required|in:utama,tambahan',
            'work_results.*.rencana_hasil_kerja_pimpinan' => 'nullable|string|max:1000',
            'work_results.*.rencana_hasil_kerja' => 'required|string|max:1000',
            'work_results.*.performance_indicators' => 'required|array|min:1',
            'work_results.*.performance_indicators.*.aspek' => 'required|string|max:255',
            'work_results.*.performance_indicators.*.indikator_kinerja_individu' => 'required|string|max:1000',
            'work_results.*.performance_indicators.*.target' => 'required|string|max:255',

            'work_behaviors' => 'required|array|min:1',
            'work_behaviors.*.perilaku_kerja' => 'required|string|max:255',
            'work_behaviors.*.deskripsi_perilaku' => 'nullable|string|max:1000',
            'work_behaviors.*.ekspektasi_pimpinan' => 'required|string|max:1000',

            'resource_names' => 'nullable|string|max:2000',
            'accountability_description' => 'nullable|string|max:2000',
            'consequence_description' => 'nullable|string|max:2000',
        ]);

        $pegawai = Employee::with('position')->find($validatedData['pegawai_id']);
        $penilai = Employee::with('position')->find($validatedData['penilai_id']);

        if ($pegawai && in_array($pegawai->position_id, $kepalaPosisiIds->toArray())) {
            return back()->withErrors(['pegawai_id' => 'Pegawai yang dinilai tidak boleh berjabatan Kepala.'])->withInput();
        }

        if ($penilai && !in_array($penilai->position_id, $kepalaPosisiIds->toArray())) {
            return back()->withErrors(['penilai_id' => 'Penilai harus berjabatan Kepala.'])->withInput();
        }

        DB::beginTransaction();
        try {
            // 1. Perbarui data utama SKP
            $skpReport->update([
                'pegawai_id' => $validatedData['pegawai_id'],
                'penilai_id' => $validatedData['penilai_id'],
                'periode_mulai' => $validatedData['periode_mulai'],
                'periode_selesai' => $validatedData['periode_selesai'],
                'tanggal_penilaian' => $validatedData['tanggal_penilaian'],
            ]);

            // 2. Perbarui data relasi (hapus dan buat ulang untuk kesederhanaan)
            // Hapus semua hasil kerja dan indikator terkait yang ada
            foreach ($skpReport->workResults as $workResult) {
                $workResult->performanceIndicators()->delete();
                $workResult->delete();
            }
            // Buat ulang hasil kerja dan indikator kinerja
            foreach ($validatedData['work_results'] as $wrData) {
                $workResult = $skpReport->workResults()->create([
                    'type' => $wrData['type'],
                    'rencana_hasil_kerja_pimpinan' => $wrData['rencana_hasil_kerja_pimpinan'] ?? null,
                    'rencana_hasil_kerja' => $wrData['rencana_hasil_kerja'],
                ]);
                foreach ($wrData['performance_indicators'] as $piData) {
                    $workResult->performanceIndicators()->create([
                        'aspek' => $piData['aspek'],
                        'indikator_kinerja_individu' => $piData['indikator_kinerja_individu'],
                        'target' => $piData['target'],
                    ]);
                }
            }

            // Hapus dan buat ulang perilaku kerja
            $skpReport->workBehaviors()->delete();
            foreach ($validatedData['work_behaviors'] as $wbData) {
                $skpReport->workBehaviors()->create([
                    'perilaku_kerja' => $wbData['perilaku_kerja'],
                    'deskripsi_perilaku' => $wbData['deskripsi_perilaku'] ?? null,
                    'ekspektasi_pimpinan' => $wbData['ekspektasi_pimpinan'],
                ]);
            }

            // Hapus dan buat ulang dukungan sumber daya
            $skpReport->supportingResources()->delete();
            if (!empty($validatedData['resource_names'])) {
                $resources = array_map('trim', explode(',', $validatedData['resource_names']));
                foreach ($resources as $resourceName) {
                    if (!empty($resourceName)) {
                        $skpReport->supportingResources()->create(['resource_name' => $resourceName]);
                    }
                }
            }

            // Hapus dan buat ulang pertanggungjawaban
            $skpReport->accountabilities()->delete();
            if (!empty($validatedData['accountability_description'])) {
                $skpReport->accountabilities()->create(['description' => $validatedData['accountability_description']]);
            }

            // Hapus dan buat ulang konsekuensi
            $skpReport->consequences()->delete();
            if (!empty($validatedData['consequence_description'])) {
                $skpReport->consequences()->create(['description' => $validatedData['consequence_description']]);
            }

            DB::commit();
            return redirect()->route('skp.index')->with('success', 'Laporan SKP berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Gagal memperbarui laporan SKP. Pesan kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Menghapus laporan SKP tertentu dari penyimpanan.
     *
     * @param  \App\Models\SkpReport  $skpReport
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SkpReport $skpReport)
    {
        try {
            $skpReport->delete(); // Karena onDelete('cascade') di migrasi, relasi akan ikut terhapus
            return redirect()->route('skp.index')->with('success', 'Laporan SKP berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal menghapus laporan SKP. Pesan kesalahan: ' . $e->getMessage()]);
        }
    }    

    public function download_surat(SkpReport $skpReport)
    {
        $skpReport->load([
            'pegawai.position',
            'penilai.position',
            'workResults.performanceIndicators',
            'workBehaviors',
            'supportingResources',
            'accountabilities',
            'consequences'
        ]);

        return view('skp_reports.print', compact('skpReport'));
        // $pdf = Pdf::loadView('skp_reports.print', compact('skpReport'))->setPaper('A4', 'portrait');
        // return $pdf->download('Laporan_SKP_' . $skpReport->pegawai->nama_pegawai . '.pdf');
    }
}
