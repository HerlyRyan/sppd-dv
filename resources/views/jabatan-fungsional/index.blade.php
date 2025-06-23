@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Data Jabatan Fungsional
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('functional-positions.create') }}" class="btn btn-primary">Tambah Data</a>
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
                        <th>Nama Jabatan Fungsional</th>
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
                                <td>{{ $item->nama_jabatan_fungsional }}</td>
                                <td class="d-flex gap-1">
                                    <div>
                                        <a href="{{ route('functional-positions.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                                    </div>
                                    <div>
                                        <form action="{{ route('functional-positions.destroy', $item) }}" method="POST">
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
