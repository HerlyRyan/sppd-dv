@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Laporan Sasaran Kinerja Pegawai (SKP)</h4>
            </div>

            <div class="card-body">
                {{-- Tampilkan pesan sukses atau error jika ada --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Terjadi kesalahan:</strong> Mohon periksa kembali input Anda.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('skp.update', $skpReport->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Bagian Informasi Utama SKP --}}
                    <div class="row mb-4 border-bottom pb-3">
                        <h5 class="mb-3 text-primary">Informasi Umum Laporan SKP</h5>
                        <div class="col-md-6 mb-3">
                            <label for="periode_mulai" class="form-label">Periode Penilaian Mulai</label>
                            <input type="date" class="form-control @error('periode_mulai') is-invalid @enderror"
                                id="periode_mulai" name="periode_mulai"
                                value="{{ old('periode_mulai', $skpReport->periode_mulai->format('Y-m-d')) }}" required>
                            @error('periode_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="periode_selesai" class="form-label">Periode Penilaian Selesai</label>
                            <input type="date" class="form-control @error('periode_selesai') is-invalid @enderror"
                                id="periode_selesai" name="periode_selesai"
                                value="{{ old('periode_selesai', $skpReport->periode_selesai->format('Y-m-d')) }}" required>
                            @error('periode_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_penilaian" class="form-label">Tanggal Penilaian</label>
                            <input type="date" class="form-control @error('tanggal_penilaian') is-invalid @enderror"
                                id="tanggal_penilaian" name="tanggal_penilaian"
                                value="{{ old('tanggal_penilaian', $skpReport->tanggal_penilaian->format('Y-m-d')) }}"
                                required>
                            @error('tanggal_penilaian')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pegawai_id" class="form-label">Pegawai Yang Dinilai</label>
                            <select name="pegawai_id" id="pegawai_id"
                                class="form-select @error('pegawai_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Pegawai --</option>
                                @foreach ($pegawaiOptions as $pegawai)
                                    <option value="{{ $pegawai->id }}" @selected(old('pegawai_id', $skpReport->pegawai_id) == $pegawai->id)>
                                        {{ $pegawai->nama_pegawai }} (NIP: {{ $pegawai->nip }}) -
                                        {{ $pegawai->position->nama_jabatan ?? 'N/A' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pegawai_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="penilai_id" class="form-label">Pejabat Penilai Kinerja</label>
                            <select name="penilai_id" id="penilai_id"
                                class="form-select @error('penilai_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Penilai --</option>
                                @foreach ($penilaiOptions as $penilai)
                                    <option value="{{ $penilai->id }}" @selected(old('penilai_id', $skpReport->penilai_id) == $penilai->id)>
                                        {{ $penilai->nama_pegawai }} (NIP: {{ $penilai->nip }}) -
                                        {{ $penilai->position->nama_jabatan ?? 'N/A' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('penilai_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Bagian Hasil Kerja --}}
                    @foreach ($skpReport->workResults as $index => $workResult)
                        <div class="row mb-4 border-bottom pb-3">
                            <h5 class="mb-3 text-primary">Hasil Kerja
                                {{ $workResult->type == 'utama' ? 'Utama' : 'Tambahan' }} #{{ $index + 1 }}</h5>
                            {{-- Hidden input untuk tipe hasil kerja --}}
                            <input type="hidden" name="work_results[{{ $index }}][type]"
                                value="{{ $workResult->type }}">
                            <input type="hidden" name="work_results[{{ $index }}][id]"
                                value="{{ $workResult->id }}">

                            <div class="col-12 mb-3">
                                <label for="rencana_pimpinan_{{ $index }}" class="form-label">Rencana Hasil Kerja
                                    Pimpinan yang Diintervensi</label>
                                <textarea name="work_results[{{ $index }}][rencana_hasil_kerja_pimpinan]"
                                    id="rencana_pimpinan_{{ $index }}"
                                    class="form-control @error('work_results.' . $index . '.rencana_hasil_kerja_pimpinan') is-invalid @enderror"
                                    rows="3">{{ old('work_results.' . $index . '.rencana_hasil_kerja_pimpinan', $workResult->rencana_hasil_kerja_pimpinan) }}</textarea>
                                @error('work_results.' . $index . '.rencana_hasil_kerja_pimpinan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="rencana_kerja_{{ $index }}" class="form-label">Rencana Hasil Kerja
                                    Individu</label>
                                <textarea name="work_results[{{ $index }}][rencana_hasil_kerja]" id="rencana_kerja_{{ $index }}"
                                    class="form-control @error('work_results.' . $index . '.rencana_hasil_kerja') is-invalid @enderror" rows="3"
                                    required>{{ old('work_results.' . $index . '.rencana_hasil_kerja', $workResult->rencana_hasil_kerja) }}</textarea>
                                @error('work_results.' . $index . '.rencana_hasil_kerja')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Indikator Kinerja untuk Hasil Kerja ini --}}
                            <h6 class="mb-2 text-secondary">Indikator Kinerja Individu</h6>
                            @foreach ($workResult->performanceIndicators as $indIndex => $indicator)
                                <div class="col-md-4 mb-3">
                                    <label for="indikator_aspek_{{ $index }}_{{ $indIndex }}"
                                        class="form-label">Aspek ({{ $indicator->aspek }})</label>
                                    <input type="text"
                                        name="work_results[{{ $index }}][performance_indicators][{{ $indIndex }}][aspek]"
                                        value="{{ $indicator->aspek }}" class="form-control" readonly>
                                    <input type="hidden"
                                        name="work_results[{{ $index }}][performance_indicators][{{ $indIndex }}][id]"
                                        value="{{ $indicator->id }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="indikator_individu_{{ $index }}_{{ $indIndex }}"
                                        class="form-label">Indikator Kinerja</label>
                                    <input type="text"
                                        name="work_results[{{ $index }}][performance_indicators][{{ $indIndex }}][indikator_kinerja_individu]"
                                        id="indikator_individu_{{ $index }}_{{ $indIndex }}"
                                        class="form-control @error('work_results.' . $index . '.performance_indicators.' . $indIndex . '.indikator_kinerja_individu') is-invalid @enderror"
                                        value="{{ old('work_results.' . $index . '.performance_indicators.' . $indIndex . '.indikator_kinerja_individu', $indicator->indikator_kinerja_individu) }}"
                                        required>
                                    @error('work_results.' . $index . '.performance_indicators.' . $indIndex .
                                        '.indikator_kinerja_individu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="indikator_target_{{ $index }}_{{ $indIndex }}"
                                        class="form-label">Target</label>
                                    <input type="text"
                                        name="work_results[{{ $index }}][performance_indicators][{{ $indIndex }}][target]"
                                        id="indikator_target_{{ $index }}_{{ $indIndex }}"
                                        class="form-control @error('work_results.' . $index . '.performance_indicators.' . $indIndex . '.target') is-invalid @enderror"
                                        value="{{ old('work_results.' . $index . '.performance_indicators.' . $indIndex . '.target', $indicator->target) }}"
                                        required>
                                    @error('work_results.' . $index . '.performance_indicators.' . $indIndex . '.target')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    {{-- Bagian Perilaku Kerja --}}
                    @foreach ($skpReport->workBehaviors as $index => $behavior)
                        <div class="row mb-4 border-bottom pb-3">
                            <h5 class="mb-3 text-primary">Perilaku Kerja: {{ $behavior->perilaku_kerja }}</h5>
                            {{-- Hidden input untuk nama perilaku kerja --}}
                            <input type="hidden" name="work_behaviors[{{ $index }}][id]"
                                value="{{ $behavior->id }}">
                            <input type="hidden" name="work_behaviors[{{ $index }}][perilaku_kerja]"
                                value="{{ $behavior->perilaku_kerja }}">
                            <div class="col-12 mb-3">
                                <label for="deskripsi_perilaku_{{ $index }}" class="form-label">Deskripsi
                                    Perilaku</label>
                                <textarea name="work_behaviors[{{ $index }}][deskripsi_perilaku]" id="deskripsi_perilaku_{{ $index }}"
                                    class="form-control @error('work_behaviors.' . $index . '.deskripsi_perilaku') is-invalid @enderror"
                                    rows="3">{{ old('work_behaviors.' . $index . '.deskripsi_perilaku', $behavior->deskripsi_perilaku) }}</textarea>
                                @error('work_behaviors.' . $index . '.deskripsi_perilaku')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="ekspektasi_pimpinan_{{ $index }}" class="form-label">Ekspektasi Khusus
                                    Pimpinan</label>
                                <input type="text" name="work_behaviors[{{ $index }}][ekspektasi_pimpinan]"
                                    id="ekspektasi_pimpinan_{{ $index }}"
                                    class="form-control @error('work_behaviors.' . $index . '.ekspektasi_pimpinan') is-invalid @enderror"
                                    value="{{ old('work_behaviors.' . $index . '.ekspektasi_pimpinan', $behavior->ekspektasi_pimpinan) }}"
                                    required>
                                @error('work_behaviors.' . $index . '.ekspektasi_pimpinan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach

                    {{-- Bagian Dukungan Sumber Daya --}}
                    <div class="row mb-4 border-bottom pb-3">
                        <h5 class="mb-3 text-primary">Dukungan Sumber Daya (Pisahkan dengan koma jika lebih dari satu)</h5>
                        <div class="col-12 mb-3">
                            <label for="resource_names" class="form-label">Nama Sumber Daya</label>
                            <textarea name="resource_names" id="resource_names"
                                class="form-control @error('resource_names') is-invalid @enderror" rows="3">{{ old('resource_names', $skpReport->supportingResources->pluck('resource_name')->implode(', ')) }}</textarea>
                            <small class="form-text text-muted">Contoh: sumber daya manusia, anggaran, peralatan
                                kerja</small>
                            @error('resource_names')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Bagian Pertanggungjawaban --}}
                    <div class="row mb-4 border-bottom pb-3">
                        <h5 class="mb-3 text-primary">Pertanggungjawaban (Skema)</h5>
                        <div class="col-12 mb-3">
                            <label for="accountability_description" class="form-label">Deskripsi
                                Pertanggungjawaban</label>
                            <textarea name="accountability_description" id="accountability_description"
                                class="form-control @error('accountability_description') is-invalid @enderror" rows="3">{{ old('accountability_description', $skpReport->accountabilities->first()->description ?? '') }}</textarea>
                            @error('accountability_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Bagian Konsekuensi --}}
                    <div class="row mb-4">
                        <h5 class="mb-3 text-primary">Konsekuensi</h5>
                        <div class="col-12 mb-3">
                            <label for="consequence_description" class="form-label">Deskripsi Konsekuensi</label>
                            <textarea name="consequence_description" id="consequence_description"
                                class="form-control @error('consequence_description') is-invalid @enderror" rows="3">{{ old('consequence_description', $skpReport->consequences->first()->description ?? '') }}</textarea>
                            @error('consequence_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('skp.index') }}" class="btn btn-secondary btn-lg me-2">Batal</a>
                        <button type="submit" class="btn btn-success btn-lg">Update Laporan SKP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
