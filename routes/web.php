<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkpReportController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\LpjHeaderController;
use App\Http\Controllers\FunctionalPositionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UnitKerjaController;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

// Login routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

// Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN ROUTE
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', function () {
        $totalPegawaiAktif = Employee::where('status', 'aktif')->count();
        $totalPegawaiNonAktif = Employee::where('status', 'nonaktif')->count();
        return view('welcome', compact('totalPegawaiAktif', 'totalPegawaiNonAktif'));
    });

    Route::resources([
        'employees' => EmployeeController::class,
        'positions' => PositionController::class,
        'grades' => GradeController::class,
        'agencies' => AgencyController::class,
        'functional-positions' => FunctionalPositionController::class,
        'unit_kerja' => UnitKerjaController::class,
    ]);

    Route::post('lpj-header/approve/{lpj_header}', [LpjHeaderController::class, 'approve'])->name('lpj-header.approve');
    Route::post('lpj-header/reject/{lpj_header}', [LpjHeaderController::class, 'reject'])->name('lpj-header.reject');

    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/grafik-skp', [ReportController::class, 'grafikSKPAntarPegawai'])->name('grafik-skp.index');
        Route::get('/grafik-skp/print', [ReportController::class, 'printGrafikSKPAntarPegawai'])->name('grafik-skp.print');

        Route::get('/ringkasan-kinerja', [ReportController::class, 'ringkasanKinerjaPerUnit'])->name('ringkasan-kinerja.index');
        Route::get('/ringkasan-kinerja/print', [ReportController::class, 'printRingkasanKinerjaPerUnit'])->name('ringkasan-kinerja.print');

        Route::get('/kehadiran-tahunan', [ReportController::class, 'kehadiranTahunan'])->name('kehadiran-tahunan.index');
        Route::get('/kehadiran-tahunan/print', [ReportController::class, 'printKehadiranTahunan'])->name('kehadiran-tahunan.print');

        Route::get('/pegawai', [ReportController::class, 'indexPegawai'])->name('pegawai.index');
        Route::get('/pegawai/print', [ReportController::class, 'printPegawai'])->name('pegawai.print');

        Route::get('/sppd-per-bulan', [ReportController::class, 'sppdPerBulan'])->name('sppd-per-bulan.index');
        Route::get('/sppd-per-bulan/print', [ReportController::class, 'printSppdPerBulan'])->name('sppd-per-bulan.print');

        Route::get('/skp', [ReportController::class, 'indexSKP'])->name('skp.index');
        Route::get('/skp/print', [ReportController::class, 'printSKP'])->name('skp.print');
    });
});

// Pegawai BKN
Route::middleware(['auth', 'role:admin,pegawai_bkn'])->group(function () {
    Route::get('/buat-surat', fn() => view('surat'))->name('surat.index');
    Route::get('/history-surat', fn() => view('history', [
        'items' => DB::table('surat')->paginate(10)
    ]));
    Route::delete('/history-surat/{id}', function ($id) {
        DB::table('surat')->where('id', $id)->delete();
        return redirect('/history-surat')->with('success', 'Data surat berhasil dihapus.');
    })->name('history.destroy');

    Route::resource('sppd', SppdController::class);
    Route::get('sppd/{sppd}/buat', [SppdController::class, 'buat_surat'])->name('sppd.buat-surat');
    Route::get('sppd/{sppd}/download', [SppdController::class, 'download_surat'])->name('sppd.download-surat');

    Route::resource('lpj-header', LpjHeaderController::class);
    Route::post('lpj-header/submit/{lpj_header}', [LpjHeaderController::class, 'submit'])->name('lpj-header.submit');
    Route::get('lpj-header/create/{lpj_header}', [LpjHeaderController::class, 'create_detail'])->name('lpj-header.create-detail');
    Route::get('lpj-header/detail/{lpj_header}', [LpjHeaderController::class, 'show_detail'])->name('lpj-header.show-detail');
    Route::post('lpj-header/store-detail', [LpjHeaderController::class, 'store_detail'])->name('lpj-header.store-detail');
    Route::put('lpj-header/update-detail/{lpj_detail}', [LpjHeaderController::class, 'update_detail'])->name('lpj-header.update-detail');
    Route::get('lpj-header/export/{lpj_header}', [LpjHeaderController::class, 'export'])->name('lpj-header.export');
    Route::delete('lpj-header/destroy-detail/{id}', [LpjHeaderController::class, 'destroy_detail'])->name('lpj-header.destroy-detail');
});

Route::middleware(['auth', 'role:pimpinan_unit_kerja'])->group(function () {
    Route::post('skp/approve/{skpReport}', [SkpReportController::class, 'approve_stage_one'])->name('skp.approved_stage_one');
    Route::get('skp/notsubmit', [SkpReportController::class, 'indexPimpinan'])->name('skp.not-submit');
});

Route::middleware(['auth', 'role:pimpinan_bkn'])->group(function () {
    Route::post('skp/approve_final/{skpReport}', [SkpReportController::class, 'approved_final'])->name('skp.approved_final');
});

// SKP ROUTES (semua role kecuali pegawai_bkn)
Route::middleware(['auth', 'role:admin,pegawai_unit_kerja,pimpinan_unit_kerja,pimpinan_bkn'])->group(function () {
    Route::resource('skp', SkpReportController::class)->parameters(['skp' => 'skpReport']);
    Route::get('skp/{skpReport}/print', [SkpReportController::class, 'download_surat'])->name('skp.print');
    Route::post('skp/reject/{skpReport}', [SkpReportController::class, 'rejected'])->name('skp.rejected');
});
