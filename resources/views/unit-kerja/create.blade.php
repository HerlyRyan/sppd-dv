@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Tambah Data
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('unit_kerja.store') }}" method="POST">
                <div class="row gap-3">
                    @csrf
                    <div class="col-12">
                        <label for="nama_unit_kerja" class="form-label">Nama Unit Kerja</label>
                        <input type="text" class="form-control @error('nama_unit_kerja') is-invalid @enderror" id="nama_unit_kerja"
                            name="nama_unit_kerja" value="{{ old('nama_unit_kerja') }}">

                        @error('nama_unit_kerja')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
