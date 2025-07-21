@extends('layouts.app')

@section('content')
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success mb-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
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
                                <td class="d-flex gap-1">
                                    <a href="{{ asset('storage/surat/' . $item->nama_file) }}" class="btn btn-sm btn-success"
                                        target="_blank">
                                        Lihat
                                    </a>
                                    @if (Auth::user()->role == 'admin')
                                        <div>
                                            <form action="{{ route('history.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    @endif
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
