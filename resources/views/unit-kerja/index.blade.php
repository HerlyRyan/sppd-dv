@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Data Unit Kerja
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('unit_kerja.create') }}" class="btn btn-primary">Tambah Data</a>
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
                        <th>Nama Unit Kerja</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($items->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data</td>
                        </tr>
                    @else
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->nama_unit_kerja }}</td>
                                <td class="d-flex gap-1">
                                    <div>
                                        <a href="{{ route('unit_kerja.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                                    </div>
                                    <div>
                                        <form action="{{ route('unit_kerja.destroy', $item) }}" method="POST">
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
