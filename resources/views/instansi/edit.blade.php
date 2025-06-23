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
            <form action="{{ route('agencies.update', $agency) }}" method="POST">
                <div class="row gap-3">
                    @csrf
                    @method('put')
                    <div class="col-12">
                        <label for="instansi" class="form-label">Nama Instansi</label>
                        <input type="text" class="form-control @error('instansi') is-invalid @enderror" id="instansi"
                            name="instansi" value="{{ old('instansi', $agency->instansi) }}">

                        @error('instansi')
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
