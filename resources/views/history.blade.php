@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            History Surat
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No Surat</th>
                        <th>Jenis Surat</th>
                        <th>Tanggal Dibuat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($items->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    @else
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->no_surat }}</td>
                                <td>{{ $item->jenis_surat }}</td>
                                <td>{{ $item->tanggal_surat }}</td>
                                <td>
                                    <a href="{{ asset('storage/surat/' . $item->nama_file) }}"
                                        class="btn btn-sm btn-success" target="_blank">
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $items->links() }}
        </div>
    </div>
@endsection
