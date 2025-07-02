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
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

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
    ]);

    Route::get('/buat-surat', fn() => view('surat'))->name('surat.index');
    Route::get('/history-surat', fn() => view('history', [
        'items' => DB::table('surat')->paginate(20)
    ]));

    Route::resource('sppd', SppdController::class);
    Route::get('sppd/{sppd}/buat', [SppdController::class, 'buat_surat'])->name('sppd.buat-surat');
    Route::get('sppd/{sppd}/download', [SppdController::class, 'download_surat'])->name('sppd.download-surat');

    Route::resource('lpj-header', LpjHeaderController::class);
    Route::get('lpj-header/detail/{lpj_header}', [LpjHeaderController::class, 'create_detail'])->name('lpj-header.create-detail');
    Route::post('lpj-header/store-detail', [LpjHeaderController::class, 'store_detail'])->name('lpj-header.store-detail');
    Route::post('lpj-header/submit/{lpj_header}', [LpjHeaderController::class, 'submit'])->name('lpj-header.submit');
    Route::post('lpj-header/approve/{lpj_header}', [LpjHeaderController::class, 'approve'])->name('lpj-header.approve');
    Route::post('lpj-header/reject/{lpj_header}', [LpjHeaderController::class, 'reject'])->name('lpj-header.reject');
    Route::get('lpj-header/export/{lpj_header}', [LpjHeaderController::class, 'export'])->name('lpj-header.export');
    Route::delete('lpj-header/destroy-detail/{id}', [LpjHeaderController::class, 'destroy_detail'])->name('lpj-header.destroy-detail');
});

// SKP ROUTES (semua role kecuali pegawai_bkn)
Route::middleware(['auth', 'role:admin,pegawai_unit_kerja,pimpinan_unit_kerja,pimpinan_bkn'])->group(function () {
    Route::resource('skp', SkpReportController::class)->parameters(['skp' => 'skpReport']);
    Route::get('skp/{skpReport}/print', [SkpReportController::class, 'download_surat'])->name('skp.print');
});

// Pegawai BKN
Route::middleware(['auth', 'role:admin,pegawai_bkn'])->group(function () {
    Route::get('/buat-surat', fn() => view('surat'))->name('surat.index');
    Route::get('/history-surat', fn() => view('history', [
        'items' => DB::table('surat')->paginate(20)
    ]));

    Route::resource('sppd', SppdController::class)->only(['index', 'show']);
    Route::get('sppd/{sppd}/download', [SppdController::class, 'download_surat'])->name('sppd.download-surat');

    Route::resource('lpj-header', LpjHeaderController::class)->only(['index', 'show']);
    Route::get('lpj-header/export/{lpj_header}', [LpjHeaderController::class, 'export'])->name('lpj-header.export');
});
