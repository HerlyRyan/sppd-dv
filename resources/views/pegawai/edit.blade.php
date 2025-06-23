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
            <form action="{{ route('employees.update', $employee) }}" method="POST">
                <div class="row gap-3">
                    @csrf
                    @method('put')
                    <div class="col-12">
                        <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                        <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror"
                            id="nama_pegawai" name="nama_pegawai"
                            value="{{ old('nama_pegawai', $employee->nama_pegawai) }}">

                        @error('nama_pegawai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip"
                            name="nip" value="{{ old('nip', $employee->nip) }}">

                        @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="npwp" class="form-label">NPWP</label>
                        <input type="text" class="form-control @error('npwp') is-invalid @enderror"
                            id="npwp" name="npwp" value="{{ old('npwp', $employee->npwp) }}">

                        @error('npwp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin"
                            class="form-select @error('jenis_kelamin') is-invalid @enderror">
                            <option value="L" @selected(old('jenis_kelamin', $employee->jenis_kelamin) == 'L')>Laki-laki</option>
                            <option value="P" @selected(old('jenis_kelamin', $employee->jenis_kelamin) == 'P')>Perempuan</option>
                        </select>

                        @error('jenis_kelamin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="position_id" class="form-label">Jabatan</label>
                        <select name="position_id" id="position_id"
                            class="form-select @error('position_id') is-invalid @enderror">
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}" @selected(old('position_id', $employee->position_id) == $position->id)>
                                    {{ $position->nama_jabatan }}
                                </option>
                            @endforeach
                        </select>

                        @error('position_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="functional_position_id" class="form-label">Jabatan Fungsional</label>
                        <select name="functional_position_id" id="functional_position_id"
                            class="form-select @error('functional_position_id') is-invalid @enderror">
                            @foreach ($functional_positions as $functional_position)
                                <option value="{{ $functional_position->id }}" @selected(old('functional_position_id') == $functional_position->id)>
                                    {{ $functional_position->nama_jabatan_fungsional }}
                                </option>
                            @endforeach
                        </select>

                        @error('functional_position_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="agency_id" class="form-label">Instansi</label>
                        <select name="agency_id" id="agency_id"
                            class="form-select @error('agency_id') is-invalid @enderror">
                            @foreach ($agencies as $agency)
                                <option value="{{ $agency->id }}" @selected(old('agency_id') == $agency->id)>
                                    {{ $agency->instansi }}
                                </option>
                            @endforeach
                        </select>

                        @error('agency_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="grade_id" class="form-label">Golongan</label>
                        <select name="grade_id" id="grade_id" class="form-select @error('grade_id') is-invalid @enderror">
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}" @selected(old('grade_id', $employee->grade_id) == $grade->id)>
                                    {{ $grade->golongan }} ({{ $grade->pajak }}%) | {{$grade->lama}} tahun
                                </option>
                            @endforeach
                        </select>

                        @error('grade_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="aktif" @selected(old('status', $employee->status) == 'aktif')>Aktif</option>
                            <option value="nonaktif" @selected(old('status', $employee->status) == 'nonaktif')>Nonaktif</option>
                        </select>

                        @error('status')
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
