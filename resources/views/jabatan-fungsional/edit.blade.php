@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Edit Data
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('functional-positions.update', $functional_position) }}" method="POST">
                <div class="row gap-3">
                    @csrf
                    @method('put')
                    <div class="col-12">
                        <label for="nama_jabatan_fungsional" class="form-label">Nama Jabatan</label>
                        <input type="text" class="form-control @error('nama_jabatan_fungsional') is-invalid @enderror"
                            id="nama_jabatan_fungsional" name="nama_jabatan_fungsional" value="{{ old('nama_jabatan_fungsional', $functional_position->nama_jabatan_fungsional) }}">

                        @error('nama_jabatan_fungsional')
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
