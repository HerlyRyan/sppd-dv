@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white text-center py-4">
                <h5 class="mb-1">PEMERINTAH KOTA BANJARBARU</h5>
                <h4 class="mb-1">SASARAN KINERJA PEGAWAI</h4>
                <h5 class="mb-3">PENDEKATAN HASIL KERJA KUANTITATIF</h5>
                <h6 class="mb-0">BAGI PEJABAT ADMINISTRASI DAN PEJABAT FUNGSIONAL</h6>
                <p class="mb-0">PERIODE PENILAIAN:
                    {{ \Carbon\Carbon::parse($skpReport->periode_mulai)->format('d F Y') }} SD
                    {{ \Carbon\Carbon::parse($skpReport->periode_selesai)->format('d F Y') }}
                </p>
            </div>

            <div class="card-body p-4">
                <div class="row mb-4">
                    <div class="col-md-6 border-end">
                        <h5 class="text-primary mb-3">PEGAWAI YANG DINILAI</h5>
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td style="width: 30%;">NAMA</td>
                                <td style="width: 5%;">:</td>
                                <td>{{ $skpReport->pegawai->nama_pegawai ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td>{{ $skpReport->pegawai->nip ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>PANGKAT/GOL. RUANG</td>
                                <td>:</td>
                                <td>{{ $skpReport->pegawai->grade->golongan ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>JABATAN</td>
                                <td>:</td>
                                <td>{{ $skpReport->pegawai->position->nama_jabatan ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>UNIT KERJA</td>
                                <td>:</td>
                                <td>{{ $skpReport->pegawai->agency->instansi ?? 'N/A' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary mb-3">PEJABAT PENILAI KINERJA</h5>
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td style="width: 30%;">NAMA</td>
                                <td style="width: 5%;">:</td>
                                <td>{{ $skpReport->penilai->nama_pegawai ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td>{{ $skpReport->penilai->nip ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>PANGKAT/GOL. RUANG</td>
                                <td>:</td>
                                <td>{{ $skpReport->penilai->grade->golongan ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>JABATAN</td>
                                <td>:</td>
                                <td>{{ $skpReport->penilai->position->nama_jabatan ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>UNIT KERJA</td>
                                <td>:</td>
                                <td>{{ $skpReport->pegawai->agency->instansi ?? 'N/A' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <h5 class="text-primary mb-3 mt-4">HASIL KERJA</h5>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-sm">
                        <thead class="table-light">
                            <tr>
                                <th rowspan="2" class="align-middle text-center" style="width: 5%;">NO</th>
                                <th rowspan="2" class="align-middle text-center" style="width: 25%;">RENCANA HASIL KERJA
                                    PIMPINAN YANG DIINTERVENSI</th>
                                <th rowspan="2" class="align-middle text-center" style="width: 25%;">RENCANA HASIL KERJA
                                </th>
                                <th colspan="3" class="text-center">INDIKATOR KINERJA INDIVIDU</th>
                            </tr>
                            <tr>
                                <th class="text-center" style="width: 10%;">ASPEK</th>
                                <th class="text-center" style="width: 20%;">INDIKATOR KINERJA INDIVIDU</th>
                                <th class="text-center" style="width: 15%;">TARGET</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($skpReport->workResults as $index => $workResult)
                                @php
                                    $firstIndicator = true;
                                @endphp
                                @forelse ($workResult->performanceIndicators as $ind => $indicator)
                                    <tr>
                                        @if ($firstIndicator)
                                            <td rowspan="{{ count($workResult->performanceIndicators) }}"
                                                class="align-top text-center">{{ $index + 1 }}</td>
                                            <td rowspan="{{ count($workResult->performanceIndicators) }}"
                                                class="align-top">{{ $workResult->rencana_hasil_kerja_pimpinan ?? '-' }}
                                            </td>
                                            <td rowspan="{{ count($workResult->performanceIndicators) }}"
                                                class="align-top">{{ $workResult->rencana_hasil_kerja }}</td>
                                            @php $firstIndicator = false; @endphp
                                        @endif
                                        <td>{{ $indicator->aspek }}</td>
                                        <td>{{ $indicator->indikator_kinerja_individu }}</td>
                                        <td>{{ $indicator->target }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="align-top text-center">{{ $index + 1 }}</td>
                                        <td class="align-top">{{ $workResult->rencana_hasil_kerja_pimpinan ?? '-' }}</td>
                                        <td class="align-top">{{ $workResult->rencana_hasil_kerja }}</td>
                                        <td colspan="3" class="text-center text-muted">Tidak ada indikator kinerja</td>
                                    </tr>
                                @endforelse
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Tidak ada Hasil Kerja Utama/Tambahan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <h5 class="text-primary mb-3 mt-4">PERILAKU KERJA</h5>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-sm">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 5%;">NO</th>
                                <th style="width: 30%;">PERILAKU KERJA</th>
                                <th style="width: 45%;">DESKRIPSI</th>
                                <th style="width: 20%;">EKSPEKTASI KHUSUS PIMPINAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($skpReport->workBehaviors as $index => $behavior)
                                <tr>
                                    <td class="text-center align-top">{{ $index + 1 }}</td>
                                    <td class="align-top"><strong>{{ $behavior->perilaku_kerja }}</strong></td>
                                    <td class="align-top">{{ $behavior->deskripsi_perilaku ?? '-' }}</td>
                                    <td class="align-top">{{ $behavior->ekspektasi_pimpinan }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Tidak ada data Perilaku Kerja.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <h5 class="text-primary mb-3 mt-4">LAMPIRAN SASARAN KINERJA PEGAWAI</h5>
                <div class="mb-4">
                    <h6 class="text-secondary mb-2">DUKUNGAN SUMBER DAYA</h6>
                    <ol>
                        @forelse ($skpReport->supportingResources as $resource)
                            <li>{{ $resource->resource_name }}</li>
                        @empty
                            <li class="text-muted">Tidak ada dukungan sumber daya yang tercatat.</li>
                        @endforelse
                    </ol>
                </div>

                <div class="mb-4">
                    <h6 class="text-secondary mb-2">PERTANGGUNGJAWABAN (SKEMA)</h6>
                    <ol>
                        @forelse ($skpReport->accountabilities as $accountability)
                            <li>{{ $accountability->description }}</li>
                        @empty
                            <li class="text-muted">Tidak ada skema pertanggungjawaban yang tercatat.</li>
                        @endforelse
                    </ol>
                </div>

                <div class="mb-4">
                    <h6 class="text-secondary mb-2">KONSEKUENSI</h6>
                    <ol>
                        @forelse ($skpReport->consequences as $consequence)
                            <li>{{ $consequence->description }}</li>
                        @empty
                            <li class="text-muted">Tidak ada konsekuensi yang tercatat.</li>
                        @endforelse
                    </ol>
                </div>

                <div class="d-flex justify-around">
                    <div class="row mt-4">
                        <div class="text-center">
                            <p class="mb-4">Pegawai yang Dinilai</p>
                            <br><br><br> {{-- Placeholder for signature line --}}
                            <p class="mb-0"><strong>{{ $skpReport->pegawai->name ?? 'N/A' }}</strong></p>
                            <p class="mb-0">NIP. {{ $skpReport->pegawai->nip ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="text-center">
                            <p class="mb-1">{{ \Carbon\Carbon::parse($skpReport->tanggal_penilaian)->format('d F Y') }}
                            </p>
                            <p class="mb-4">Pejabat Penilai Kinerja</p>
                            <br><br><br> {{-- Placeholder for signature line --}}
                            <p class="mb-0"><strong>{{ $skpReport->penilai->name ?? 'N/A' }}</strong></p>
                            <p class="mb-0">NIP. {{ $skpReport->penilai->nip ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
