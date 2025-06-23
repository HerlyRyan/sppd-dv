@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Data Golongan
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('grades.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success mb-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Golongan</th>
                        <th>Gaji Pokok</th>
                        <th>Pajak</th>
                        <th>Lama (Tahun)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($items->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                    @else
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->golongan }}</td>
                                <td>{{ number_format($item->gaji_pokok, 0, ',', '.') }}</td>
                                <td>{{ $item->pajak }}</td>
                                <td>{{ $item->lama }} tahun</td>
                                <td class="d-flex gap-1">
                                    <div>
                                        <a href="{{ route('grades.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                                    </div>
                                    <div>
                                        <form action="{{ route('grades.destroy', $item) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </div>
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
