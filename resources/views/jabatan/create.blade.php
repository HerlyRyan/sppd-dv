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
            <form action="{{ route('positions.store') }}" method="POST">
                <div class="row gap-3">
                    @csrf
                    <div class="col-12">
                        <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                        <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror"
                            id="nama_jabatan" name="nama_jabatan" value="{{ old('nama_jabatan') }}">

                        @error('nama_jabatan')
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
