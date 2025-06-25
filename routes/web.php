<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FunctionalPositionController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LpjHeaderController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SkpReportController;
use App\Http\Controllers\SppdController;
use App\Models\Employee;
use App\Models\Sppd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $totalPegawaiAktif = Employee::where('status', 'aktif')->count();
        $totalPegawaiNonAktif = Employee::where('status', 'nonaktif')->count();

        return view('welcome', compact('totalPegawaiAktif', 'totalPegawaiNonAktif'));
    });

    // GOLONGAN
    Route::resource('grades', GradeController::class);

    // JABATAN
    Route::resource('positions', PositionController::class);

    // JABATAN FUNGSIONAL
    Route::resource('functional-positions', FunctionalPositionController::class);

    // INSTANSI
    Route::resource('agencies', AgencyController::class);

    // PEGAWAI
    Route::resource('employees', EmployeeController::class);

    // BUAT SURAT
    Route::get('/buat-surat', function () {
        return view('surat');
    })->name('surat.index');

    // HISTORY SURAT
    Route::get('/history-surat', function () {
        $items = DB::table('surat')->paginate(20);

        return view('history', compact('items'));
    });

    // SPPD
    Route::resource('sppd', SppdController::class);
    Route::get('sppd/{sppd}', [SppdController::class, 'buat_surat'])->name('sppd.buat-surat');
    Route::get('sppd/download/{sppd}', [SppdController::class, 'download_surat'])->name('sppd.download-surat');

    // SKP
    Route::resource('skp', SkpReportController::class)->parameters([
        'skp' => 'skpReport'
    ]);
    Route::get('/skp/{skpReport}/print', [SkpReportController::class, 'download_surat'])->name('skp.print');
    // Route::get('skp/{skp}', [SkpReportController::class, 'buat_surat'])->name('skp.buat-surat');
    // Route::get('skp/download/{skp}', [SkpReportController::class, 'download_surat'])->name('skp.download-surat');

    // LPJ
    Route::resource('lpj-header', LpjHeaderController::class);

    Route::get('lpj-header/detail/{lpj_header}', [LpjHeaderController::class, 'create_detail'])->name('lpj-header.create-detail');
    Route::post('lpj-header/store-detail', [LpjHeaderController::class, 'store_detail'])->name('lpj-header.store-detail');
    Route::post('lpj-header/submit/{lpj_header}', [LpjHeaderController::class, 'submit'])->name('lpj-header.submit');
    Route::post('lpj-header/approve/{lpj_header}', [LpjHeaderController::class, 'approve'])->name('lpj-header.approve');
    Route::post('lpj-header/reject/{lpj_header}', [LpjHeaderController::class, 'reject'])->name('lpj-header.reject');
    Route::get('lpj-header/export/{lpj_header}', [LpjHeaderController::class, 'export'])->name('lpj-header.export');
    Route::delete('lpj-header/destroy-detail/{id}', [LpjHeaderController::class, 'destroy_detail'])->name('lpj-header.destroy-detail');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});
