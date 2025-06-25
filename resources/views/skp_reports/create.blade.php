@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Laporan Sasaran Kinerja Pegawai (SKP)</h4>
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

                <form action="{{ route('skp.store') }}" method="POST">
                    @csrf

                    {{-- Bagian Informasi Utama SKP --}}
                    <div class="row mb-4 border-bottom pb-3">
                        <h5 class="mb-3 text-primary">Informasi Umum Laporan SKP</h5>
                        <div class="col-md-6 mb-3">
                            <label for="periode_mulai" class="form-label">Periode Penilaian Mulai</label>
                            <input type="date" class="form-control @error('periode_mulai') is-invalid @enderror"
                                id="periode_mulai" name="periode_mulai" value="{{ old('periode_mulai') }}" required>
                            @error('periode_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="periode_selesai" class="form-label">Periode Penilaian Selesai</label>
                            <input type="date" class="form-control @error('periode_selesai') is-invalid @enderror"
                                id="periode_selesai" name="periode_selesai" value="{{ old('periode_selesai') }}" required>
                            @error('periode_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_penilaian" class="form-label">Tanggal Penilaian</label>
                            <input type="date" class="form-control @error('tanggal_penilaian') is-invalid @enderror"
                                id="tanggal_penilaian" name="tanggal_penilaian" value="{{ old('tanggal_penilaian', date('Y-m-d')) }}" required>
                            @error('tanggal_penilaian')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pegawai_id" class="form-label">Pegawai Yang Dinilai</label>
                            <select name="pegawai_id" id="pegawai_id"
                                class="form-select @error('pegawai_id') is-invalid @enderror" required>
                                <option value="" selected>-- Pilih Pegawai --</option>
                                {{-- $pegawaiOptions harus disediakan dari controller, berisi user dengan jabatan bukan kepala bidang --}}
                                @foreach ($pegawaiOptions as $pegawai)
                                    <option value="{{ $pegawai->id }}" @selected(old('pegawai_id') == $pegawai->id)>
                                        {{ $pegawai->name }} (NIP: {{ $pegawai->nip }}) - {{ $pegawai->jabatan }}
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
                                <option value="" selected>-- Pilih Penilai --</option>
                                {{-- $penilaiOptions harus disediakan dari controller, berisi user dengan jabatan kepala bidang --}}
                                @foreach ($penilaiOptions as $penilai)
                                    <option value="{{ $penilai->id }}" @selected(old('penilai_id') == $penilai->id)>
                                        {{ $penilai->name }} (NIP: {{ $penilai->nip }}) - {{ $penilai->jabatan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('penilai_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Bagian Hasil Kerja (Contoh untuk satu item) --}}
                    <div class="row mb-4 border-bottom pb-3">
                        <h5 class="mb-3 text-primary">Hasil Kerja Utama (Contoh 1)</h5>
                        {{-- Hidden input untuk tipe hasil kerja --}}
                        <input type="hidden" name="work_results[0][type]" value="utama">

                        <div class="col-12 mb-3">
                            <label for="rencana_pimpinan_0" class="form-label">Rencana Hasil Kerja Pimpinan yang Diintervensi</label>
                            <textarea name="work_results[0][rencana_hasil_kerja_pimpinan]" id="rencana_pimpinan_0"
                                class="form-control @error('work_results.0.rencana_hasil_kerja_pimpinan') is-invalid @enderror"
                                rows="3">{{ old('work_results.0.rencana_hasil_kerja_pimpinan') }}</textarea>
                            @error('work_results.0.rencana_hasil_kerja_pimpinan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="rencana_kerja_0" class="form-label">Rencana Hasil Kerja Individu</label>
                            <textarea name="work_results[0][rencana_hasil_kerja]" id="rencana_kerja_0"
                                class="form-control @error('work_results.0.rencana_hasil_kerja') is-invalid @enderror"
                                rows="3" required>{{ old('work_results.0.rencana_hasil_kerja') }}</textarea>
                            @error('work_results.0.rencana_hasil_kerja')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Indikator Kinerja untuk Hasil Kerja ini (Contoh untuk 3 aspek: Kuantitas, Kualitas, Waktu) --}}
                        <h6 class="mb-2 text-secondary">Indikator Kinerja Individu</h6>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_aspek_0_0" class="form-label">Aspek (Kuantitas)</label>
                            <input type="text" name="work_results[0][performance_indicators][0][aspek]" value="Kuantitas" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_individu_0_0" class="form-label">Indikator Kinerja</label>
                            <input type="text" name="work_results[0][performance_indicators][0][indikator_kinerja_individu]"
                                id="indikator_individu_0_0" class="form-control @error('work_results.0.performance_indicators.0.indikator_kinerja_individu') is-invalid @enderror"
                                value="{{ old('work_results.0.performance_indicators.0.indikator_kinerja_individu') }}" required>
                            @error('work_results.0.performance_indicators.0.indikator_kinerja_individu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_target_0_0" class="form-label">Target</label>
                            <input type="text" name="work_results[0][performance_indicators][0][target]"
                                id="indikator_target_0_0" class="form-control @error('work_results.0.performance_indicators.0.target') is-invalid @enderror"
                                value="{{ old('work_results.0.performance_indicators.0.target') }}" required>
                            @error('work_results.0.performance_indicators.0.target')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Contoh Indikator Kualitas --}}
                        <div class="col-md-4 mb-3">
                            <label for="indikator_aspek_0_1" class="form-label">Aspek (Kualitas)</label>
                            <input type="text" name="work_results[0][performance_indicators][1][aspek]" value="Kualitas" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_individu_0_1" class="form-label">Indikator Kinerja</label>
                            <input type="text" name="work_results[0][performance_indicators][1][indikator_kinerja_individu]"
                                id="indikator_individu_0_1" class="form-control @error('work_results.0.performance_indicators.1.indikator_kinerja_individu') is-invalid @enderror"
                                value="{{ old('work_results.0.performance_indicators.1.indikator_kinerja_individu') }}" required>
                            @error('work_results.0.performance_indicators.1.indikator_kinerja_individu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_target_0_1" class="form-label">Target</label>
                            <input type="text" name="work_results[0][performance_indicators][1][target]"
                                id="indikator_target_0_1" class="form-control @error('work_results.0.performance_indicators.1.target') is-invalid @enderror"
                                value="{{ old('work_results.0.performance_indicators.1.target') }}" required>
                            @error('work_results.0.performance_indicators.1.target')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Contoh Indikator Waktu --}}
                        <div class="col-md-4 mb-3">
                            <label for="indikator_aspek_0_2" class="form-label">Aspek (Waktu)</label>
                            <input type="text" name="work_results[0][performance_indicators][2][aspek]" value="Waktu" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_individu_0_2" class="form-label">Indikator Kinerja</label>
                            <input type="text" name="work_results[0][performance_indicators][2][indikator_kinerja_individu]"
                                id="indikator_individu_0_2" class="form-control @error('work_results.0.performance_indicators.2.indikator_kinerja_individu') is-invalid @enderror"
                                value="{{ old('work_results.0.performance_indicators.2.indikator_kinerja_individu') }}" required>
                            @error('work_results.0.performance_indicators.2.indikator_kinerja_individu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="indikator_target_0_2" class="form-label">Target</label>
                            <input type="text" name="work_results[0][performance_indicators][2][target]"
                                id="indikator_target_0_2" class="form-control @error('work_results.0.performance_indicators.2.target') is-invalid @enderror"
                                value="{{ old('work_results.0.performance_indicators.2.target') }}" required>
                            @error('work_results.0.performance_indicators.2.target')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Bagian Perilaku Kerja (Contoh untuk satu perilaku) --}}
                    <div class="row mb-4 border-bottom pb-3">
                        <h5 class="mb-3 text-primary">Perilaku Kerja (Contoh: Berorientasi Pelayanan)</h5>
                        {{-- Hidden input untuk nama perilaku kerja --}}
                        <input type="hidden" name="work_behaviors[0][perilaku_kerja]" value="Berorientasi Pelayanan">
                        <div class="col-12 mb-3">
                            <label for="deskripsi_perilaku_0" class="form-label">Deskripsi Perilaku</label>
                            <textarea name="work_behaviors[0][deskripsi_perilaku]" id="deskripsi_perilaku_0"
                                class="form-control @error('work_behaviors.0.deskripsi_perilaku') is-invalid @enderror"
                                rows="3">{{ old('work_behaviors.0.deskripsi_perilaku', 'Memahami dan memenuhi kebutuhan masyarakat, Ramah, cekatan, solutif, dan dapat diandalkan, Melakukan perbaikan tiada henti') }}</textarea>
                            @error('work_behaviors.0.deskripsi_perilaku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="ekspektasi_pimpinan_0" class="form-label">Ekspektasi Khusus Pimpinan</label>
                            <input type="text" name="work_behaviors[0][ekspektasi_pimpinan]"
                                id="ekspektasi_pimpinan_0" class="form-control @error('work_behaviors.0.ekspektasi_pimpinan') is-invalid @enderror"
                                value="{{ old('work_behaviors.0.ekspektasi_pimpinan', 'Sesuai Ekspektasi') }}" required>
                            @error('work_behaviors.0.ekspektasi_pimpinan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Bagian Dukungan Sumber Daya --}}
                    <div class="row mb-4 border-bottom pb-3">
                        <h5 class="mb-3 text-primary">Dukungan Sumber Daya (Pisahkan dengan koma jika lebih dari satu)</h5>
                        <div class="col-12 mb-3">
                            <label for="resource_names" class="form-label">Nama Sumber Daya</label>
                            <textarea name="resource_names" id="resource_names"
                                class="form-control @error('resource_names') is-invalid @enderror"
                                rows="3">{{ old('resource_names', 'sumber daya manusia, anggaran, peralatan kerja, pendampingan Pimpinan, sarana dan prasarana') }}</textarea>
                            <small class="form-text text-muted">Contoh: sumber daya manusia, anggaran, peralatan kerja</small>
                            @error('resource_names')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Bagian Pertanggungjawaban --}}
                    <div class="row mb-4 border-bottom pb-3">
                        <h5 class="mb-3 text-primary">Pertanggungjawaban (Skema)</h5>
                        <div class="col-12 mb-3">
                            <label for="accountability_description" class="form-label">Deskripsi Pertanggungjawaban</label>
                            <textarea name="accountability_description" id="accountability_description"
                                class="form-control @error('accountability_description') is-invalid @enderror"
                                rows="3">{{ old('accountability_description', 'Pimpinan dan Pegawai juga harus menyepakati waktu pelaporan perkembangan hasil kerja untuk pemantauan kinerja Pegawai. Untuk pekerjaan yang sifatnya rutin, Pimpinan dan Pegawai dapat menyepakati waktu pelaporan perkembangan hasil kerja secara periodik/ berkala.') }}</textarea>
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
                                class="form-control @error('consequence_description') is-invalid @enderror"
                                rows="3">{{ old('consequence_description', 'penghargaan kepada Pegawai baik materiil maupun non materiil; dan/atau pemberian penugasan baru. pemberian teguran; dan/atau pengalihan penugasan.') }}</textarea>
                            @error('consequence_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success btn-lg">Simpan Laporan SKP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection