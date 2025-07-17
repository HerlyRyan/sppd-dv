@extends('layouts.app')

@section('content')

    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        Laporan Pegawai
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="{{ route('laporan.pegawai.print') }}" target="_blank" class="btn btn-primary">Cetak</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success mb-3" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="GET" action="{{ route('laporan.pegawai.index') }}" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Cari nama/NIP pegawai...">
                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                    </div>
                </form>


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Jenis Kelamin</th>
                                <th>Jabatan</th>
                                <th>Jabatan Fungsional</th>
                                <th>Golongan</th>
                                <th>Gaji Pokok (Rp)</th>
                                <th>Pajak</th>
                                <th>Gaji Setelah Pajak (Rp)</th>
                                <th>Lamanya (Tahun)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($items->isEmpty())
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada data</td>
                                </tr>
                            @else
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->nip }}</td>
                                        <td>{{ $item->nama_pegawai }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->position->nama_jabatan }}</td>
                                        <td>{{ $item->functional_position->nama_jabatan_fungsional }}</td>
                                        <td>{{ $item->grade->golongan }}</td>
                                        <td>{{ number_format($item->grade->gaji_pokok, 0, ',', '.') }}</td>
                                        <td>{{ number_format($item->grade->pajak, 0, ',', '.') }}%</td>
                                        <td>{{ number_format($item->grade->gaji_pokok - $item->grade->pajak * ($item->grade->gaji_pokok / 100), 0, ',', '.') }}
                                        </td>
                                        <td>{{ $item->grade->lama }} tahun</td>
                                        <td><span
                                                class="badge {{ $item->status == 'aktif' ? 'text-bg-success' : 'text-bg-danger' }}">{{ $item->status }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $items->appends(['search' => request('search')])->links() }}
            </div>

        </div>
    </div>
@endsection
