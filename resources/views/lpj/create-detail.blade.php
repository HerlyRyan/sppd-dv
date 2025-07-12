@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Tambah Data Detail LPJ
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('lpj-header.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('lpj-header.store-detail') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="" class="form-label">Nomor Surat SPPD</label>
                        <input type="text" class="form-control" id="" name=""
                            value="{{ $lpj_header->sppd->nomor_surat }}" disabled>

                        <input type="hidden" name="lpj_header_id" value="{{ $lpj_header->id }}">

                        @error('nomor_surat_sppd')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    @if ($lpj_header->submission_flag == 'N')
                        <div class="col-6 mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror"
                                id="nama_kegiatan" name="nama_kegiatan">

                            @error('nama_kegiatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="biaya_kegiatan" class="form-label">Biaya Kegiatan</label>
                            <input type="number" class="form-control @error('biaya_kegiatan') is-invalid @enderror"
                                id="biaya_kegiatan" name="biaya_kegiatan">

                            @error('biaya_kegiatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="bukti_lpj" class="form-label">Bukti PDF</label>
                            <input type="file" accept="application/pdf"
                                class="form-control @error('bukti_lpj') is-invalid @enderror" id="bukti_lpj"
                                name="bukti_lpj">

                            @error('bukti_lpj')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Detail Kegiatan LPJ
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Biaya Kegiatan</th>
                            <th>Bukti LPJ</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lpj_details as $item)
                            <tr>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <td>{{ number_format($item->biaya_kegiatan, 0, ',', '.') }}</td>
                                <td><a href="{{ asset('storage/' . $item->bukti_lpj) }}" target="_blank"
                                        class="text-blue-600 underline">Lihat Bukti (PDF)</a></td>
                                <td class="d-flex gap-1">
                                    @if ($lpj_header->submission_flag == 'N')
                                        <div>
                                            <form action="{{ route('lpj-header.destroy-detail', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
