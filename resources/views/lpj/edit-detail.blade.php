@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Edit Data Detail LPJ
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('lpj-header.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('lpj-header.update-detail', $lpj_detail) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror"
                            id="nama_kegiatan" name="nama_kegiatan"
                            value="{{ old('nama_kegiatan', $lpj_detail->nama_kegiatan) }}">

                        @error('nama_kegiatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-6 mb-3">
                        <label for="biaya_kegiatan" class="form-label">Biaya Kegiatan</label>
                        <input type="number" class="form-control @error('biaya_kegiatan') is-invalid @enderror"
                            id="biaya_kegiatan" name="biaya_kegiatan"
                            value="{{ old('biaya_kegiatan', $lpj_detail->biaya_kegiatan) }}">

                        @error('biaya_kegiatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-6 mb-3">
                        <label for="bukti_lpj" class="form-label">Bukti PDF</label>
                        <input type="file" accept="application/pdf"
                            class="form-control @error('bukti_lpj') is-invalid @enderror" id="bukti_lpj" name="bukti_lpj">

                        @if ($lpj_detail->bukti_lpj)
                            <div class="mt-2">
                                <p>File saat ini: <a href="{{ asset('storage/' . $lpj_detail->bukti_lpj) }}"
                                        target="_blank">Lihat dokumen</a></p>
                            </div>
                        @endif

                        @error('bukti_lpj')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
