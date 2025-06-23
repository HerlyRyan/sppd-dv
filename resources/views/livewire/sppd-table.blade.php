<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Data SPPD
                </div>
                @if (Auth::user()->role == 'admin')
                    <div class="col d-flex justify-content-end">
                        <a href="{{ route('sppd.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success mb-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NOMOR SURAT</th>
                            <th>TANGGAL SURAT</th>
                            <th>NAMA PEGAWAI</th>
                            <th>TUJUAN SPPD</th>
                            <th>DURASI SPPD</th>
                            <th>TEMPAT TUJUAN</th>
                            <th>BIAYA SPPD</th>
                            <th>TANGGAL DIBUAT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->nomor_surat }}</td>
                                <td style="white-space: nowrap">{{ $item->tanggal_surat }}</td>
                                <td>{{ $item->employee->nama_pegawai }}</td>
                                <td>{{ $item->tujuan_sppd }}</td>
                                <td>{{ $item->durasi_sppd }} Hari</td>
                                <td>{{ $item->tempat_tujuan }}</td>
                                <td>{{ number_format($item->biaya_sppd, 0, ',', '.') }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td style="white-space: nowrap;" class="d-flex gap-1">
                                    @if ($item->flag_buat_surat == 'N' && Auth::user()->role == 'admin')
                                        <div>
                                            <a href="{{ route('sppd.buat-surat', $item) }}"
                                                class="btn btn-sm btn-primary">Buat Surat</a>
                                        </div>
                                    @endif
                                    <div>
                                        <a href="{{ route('sppd.download-surat', $item) }}"
                                            class="btn btn-sm btn-success">Download</a>
                                    </div>
                                    @if ($item->flag_buat_surat == 'N' && Auth::user()->role == 'admin')
                                        <div>
                                            <form action="{{ route('sppd.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
