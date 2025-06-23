<div>
    <div class="card">
        <div class="card-header">
            Buat Surat
        </div>
        <div class="card-body">
            <div class="row gap-3">
                <div class="col-12">
                    <label class="form-label">Jenis Surat</label>
                    <select wire:model.live="jenis_surat" class="form-select @error('jenis_surat') is-invalid @enderror">
                        <option value="">Pilih Jenis Surat</option>
                        <option value="daftar_hadir">Daftar Hadir</option>
                        <option value="daftar_nominatif">Daftar Nominatif</option>
                        <option value="kuitansi">Kuitansi</option>
                    </select>

                    @error('jenis_surat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 {{ $jenis_surat == 'kuitansi' ? 'd-none' : '' }}">
                    <label class="form-label">Judul Surat</label>
                    <textarea wire:model="judul_surat" class="form-control @error('judul_surat') is-invalid @enderror"></textarea>

                    @error('judul_surat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Tanggal Surat</label>
                    <input type="date" wire:model="tanggal_surat"
                        class="form-control @error('tanggal_surat') is-invalid @enderror">

                    @error('tanggal_surat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div
                    class="col-12">
                    <label class="form-label">Pilih Karyawan</label>
                    <div style="max-height: 300px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;"
                        class="rounded">
                        @foreach ($employees as $employee)
                            <div class="form-check">
                                <input class="form-check-input @error('selected_employees') is-invalid @enderror"
                                    type="checkbox" wire:model="selected_employees" value="{{ $employee->id }}"
                                    id="employee-{{ $employee->id }}">
                                <label class="form-check-label" for="employee-{{ $employee->id }}">
                                    {{ $employee->nama_pegawai }} | {{ $employee->nip }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    @error('selected_employees')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 {{ $jenis_surat != 'daftar_hadir' ? 'd-none' : '' }}">
                    <label class="form-label">Ketua Tim Pelaksana</label>
                    <select wire:model.live="ketua_tim_pelaksana"
                        class="form-select @error('ketua_tim_pelaksana') is-invalid @enderror">
                        <option value="">Pilih Ketua Tim Pelaksana</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->nama_pegawai }} |
                                {{ $employee->nip }}
                            </option>
                        @endforeach
                    </select>

                    @error('ketua_tim_pelaksana')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 {{ $jenis_surat != 'kuitansi' ? 'd-none' : '' }}">
                    <label class="form-label">Untuk Pembayaran</label>
                    <textarea wire:model="untuk_pembayaran" class="form-control @error('untuk_pembayaran') is-invalid @enderror"></textarea>

                    @error('untuk_pembayaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div
                    class="col-12 {{ $jenis_surat != 'daftar_nominatif' && $jenis_surat != 'kuitansi' ? 'd-none' : '' }}">
                    <label class="form-label">Pejabat Pembuat Komitmen</label>
                    <select wire:model.live="pejabat_pembuat_komitmen"
                        class="form-select @error('pejabat_pembuat_komitmen') is-invalid @enderror">
                        <option value="">Pilih Pejabat Pembuat Komitmen</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->nama_pegawai }} |
                                {{ $employee->nip }}
                            </option>
                        @endforeach
                    </select>

                    @error('pejabat_pembuat_komitmen')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div
                    class="col-12 {{ $jenis_surat != 'daftar_nominatif' && $jenis_surat != 'kuitansi' ? 'd-none' : '' }}">
                    <label class="form-label">Bendahara</label>
                    <select wire:model.live="bendahara" class="form-select @error('bendahara') is-invalid @enderror">
                        <option value="">Pilih Bendahara</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->nama_pegawai }} |
                                {{ $employee->nip }}
                            </option>
                        @endforeach
                    </select>

                    @error('bendahara')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <button wire:click="generatePdf" wire:confirm="Yakin ingin print dan simpan surat?"
                        class="btn btn-primary" wire:loading.attr="disabled">
                        <span wire:loading.remove>Print</span>
                        <span wire:loading>Loading...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
