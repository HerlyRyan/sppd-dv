<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Data Pegawai
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success mb-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-3">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Search">
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Jabatan Fungsional</th>
                            <th>Golongan</th>
                            <th>Gaji Pokok (Rp)</th>
                            <th>Pajak</th>
                            <th>Gaji Setelah Pajak (Rp)</th>
                            <th>Lamanya (Tahun)</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($items->isEmpty())
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data</td>
                            </tr>
                        @else
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->nama_pegawai }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->position->nama_jabatan }}</td>
                                    <td>{{ $item->functional_position->nama_jabatan_fungsional }}</td>
                                    <td>{{ $item->grade->golongan }}</td>
                                    <td>{{ number_format($item->grade->gaji_pokok, 0, ',', '.') }}</td>
                                    <td>{{ number_format($item->grade->pajak, 0, ',', '.') }}%</td>
                                    <td>{{ number_format($item->grade->gaji_pokok - $item->grade->pajak * ($item->grade->gaji_pokok / 100), 0, ',', '.') }}
                                    </td>
                                    <td>{{ $item->grade->lama }} tahun</td>
                                    <td><span
                                            class="badge {{ $item->status == 'aktif' ? 'text-bg-success' : 'text-bg-danger' }}">{{ $item->status }}</span>
                                    </td>
                                    <td class="d-flex gap-1">
                                        <div>
                                            <a href="{{ route('employees.edit', $item) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                        </div>
                                        <div>
                                            <form action="{{ route('employees.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $items->links() }}
        </div>
    </div>
</div>
