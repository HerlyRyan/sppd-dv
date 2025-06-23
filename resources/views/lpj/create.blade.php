@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Tambah Data LPJ
        </div>

        <div class="card-body">
            <form action="{{ route('lpj-header.store') }}" method="POST">
                @csrf
                <div class="row gap-3">
                    <div class="col-12">
                        <label for="sppd_id" class="form-label">SPPD</label>
                        <select name="sppd_id" id="sppd_id" class="form-select @error('sppd_id') is-invalid @enderror">
                            <option value="" selected>-- Pilih SPPD --</option>
                            @foreach ($items as $sppd)
                                <option value="{{ $sppd->id }}" @selected(old('sppd_id') == $sppd->id)>
                                    {{ $sppd->nomor_surat }}
                                </option>
                            @endforeach
                        </select>

                        @error('sppd_id')
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
