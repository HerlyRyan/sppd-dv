@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if (Auth::user()->role == 'admin')
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Total Pegawai Aktif
                        </div>
                        <div class="card-body text-center">
                            <h2 class="card-title">{{ $totalPegawaiAktif }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Total Pegawai Non Aktif
                        </div>
                        <div class="card-body text-center">
                            <h2 class="card-title">{{ $totalPegawaiNonAktif }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Total SPPD {{ Auth::user()->nama_pegawai }}
                        </div>
                        <div class="card-body text-center">
                            <h2 class="card-title">{{ \App\Http\Controllers\SppdController::total_sppd_user() }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
