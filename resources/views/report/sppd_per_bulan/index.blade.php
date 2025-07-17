@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Rekapitulasi SPPD per Bulan (Tahun {{ $tahun }})</h5>
            <div>
                <form method="GET" action="{{ route('laporan.sppd-per-bulan.index') }}" class="d-inline">
                    <select name="tahun" class="form-select d-inline w-auto" onchange="this.form.submit()">
                        @for ($y = date('Y'); $y >= 2020; $y--)
                            <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}
                            </option>
                        @endfor
                    </select>
                </form>

                <a href="{{ route('laporan.sppd-per-bulan.print', ['tahun' => $tahun]) }}" class="btn btn-primary ms-2"
                    target="_blank">
                    Cetak
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Total SPPD</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $nama_bulan = [
                            1 => 'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember',
                        ];
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $nama_bulan[$item->bulan] }}</td>
                            <td>{{ $item->total_sppd }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
