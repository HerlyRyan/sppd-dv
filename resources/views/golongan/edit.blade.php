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
            <form action="{{ route('grades.update', $grade) }}" method="POST">
                <div class="row gap-3">
                    @csrf
                    @method('put')
                    <div class="col-12">
                        <label for="golongan" class="form-label">Golongan</label>
                        <input type="text" class="form-control @error('golongan') is-invalid @enderror" id="golongan"
                            name="golongan" value="{{ old('golongan', $grade->golongan) }}">

                        @error('golongan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                        <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok"
                            name="gaji_pokok" value="{{ old('gaji_pokok', $grade->gaji_pokok) }}">

                        @error('gaji_pokok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="lama" class="form-label">Lama (Tahun)</label>
                        <input type="number" class="form-control @error('lama') is-invalid @enderror" id="lama"
                            name="lama" value="{{ old('lama', $grade->lama) }}">

                        @error('lama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="pajak" class="form-label">Pajak (%)</label>
                        <input type="text" class="form-control @error('pajak') is-invalid @enderror" id="pajak"
                            name="pajak" value="{{ old('pajak', $grade->pajak) }}">

                        @error('pajak')
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
