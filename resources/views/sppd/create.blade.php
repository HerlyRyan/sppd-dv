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
            <form action="{{ route('sppd.store') }}" method="POST">
                @csrf
                <div class="row gap-3">
                    <div class="col-12">
                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                            id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}">

                        @error('nomor_surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="employee_id" class="form-label">Nama Pegawai</label>
                        <select name="employee_id" id="employee_id"
                            class="form-select @error('employee_id') is-invalid @enderror">
                            <option value="" selected>-- Pilih Pegawai --</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" @selected(old('employee_id') == $employee->id)>
                                    {{ $employee->nama_pegawai }}
                                </option>
                            @endforeach
                        </select>

                        @error('employee_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                        <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror"
                            id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat') }}">

                        @error('tanggal_surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="tujuan_sppd" class="form-label">Tujuan SPPD</label>
                        <textarea name="tujuan_sppd" id="tujuan_sppd" class="form-control @error('tujuan_sppd') is-invalid @enderror"></textarea>

                        @error('tujuan_sppd')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="transportasi" class="form-label">Transportasi</label>
                        <input type="text" class="form-control @error('transportasi') is-invalid @enderror"
                            id="transportasi" name="transportasi" value="{{ old('transportasi') }}">

                        @error('transportasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="tempat_berangkat" class="form-label">Tempat Berangkat</label>
                        <input type="text" class="form-control @error('tempat_berangkat') is-invalid @enderror"
                            id="tempat_berangkat" name="tempat_berangkat" value="{{ old('tempat_berangkat') }}">

                        @error('tempat_berangkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="tempat_tujuan" class="form-label">Tempat Tujuan</label>
                        <input type="text" class="form-control @error('tempat_tujuan') is-invalid @enderror"
                            id="tempat_tujuan" name="tempat_tujuan" value="{{ old('tempat_tujuan') }}">

                        @error('tempat_tujuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="durasi_sppd" class="form-label">Durasi SPPD (Hari)</label>
                        <input type="number" class="form-control @error('durasi_sppd') is-invalid @enderror"
                            id="durasi_sppd" name="durasi_sppd" value="{{ old('durasi_sppd') }}">

                        @error('durasi_sppd')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="tanggal_berangkat" class="form-label">Tanggal Berangkat</label>
                        <input type="date" class="form-control @error('tanggal_berangkat') is-invalid @enderror"
                            id="tanggal_berangkat" name="tanggal_berangkat" value="{{ old('tanggal_berangkat') }}">

                        @error('tanggal_berangkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror"
                            id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}">

                        @error('tanggal_kembali')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="biaya_sppd" class="form-label">Biaya SPPD (Rp)</label>
                        <input type="number" class="form-control @error('biaya_sppd') is-invalid @enderror"
                            id="biaya_sppd" name="biaya_sppd" value="{{ old('biaya_sppd') }}">

                        @error('biaya_sppd')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="pejabat_pembuat_komitmen" class="form-label">Pejabat Pembuat Komitmen</label>
                        <select name="pejabat_pembuat_komitmen" id="pejabat_pembuat_komitmen"
                            class="form-select @error('pejabat_pembuat_komitmen') is-invalid @enderror">
                            <option value="" selected>-- Pilih Pegawai --</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->nama_pegawai }}" @selected(old('pejabat_pembuat_komitmen') == $employee->nama_pegawai)>
                                    {{ $employee->nama_pegawai }}
                                </option>
                            @endforeach
                        </select>

                        @error('pejabat_pembuat_komitmen')
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
