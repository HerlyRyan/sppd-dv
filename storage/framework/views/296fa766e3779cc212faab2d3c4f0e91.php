<div>
    <div class="card">
        <div class="card-header">
            Buat Surat
        </div>
        <div class="card-body">
            <div class="row gap-3">
                <div class="col-12">
                    <label class="form-label">Jenis Surat</label>
                    <select wire:model.live="jenis_surat" class="form-select <?php $__errorArgs = ['jenis_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="">Pilih Jenis Surat</option>
                        <option value="daftar_hadir">Daftar Hadir</option>
                        <option value="daftar_nominatif">Daftar Nominatif</option>
                        <option value="kuitansi">Kuitansi</option>
                    </select>

                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['jenis_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <div class="col-12 <?php echo e($jenis_surat == 'kuitansi' ? 'd-none' : ''); ?>">
                    <label class="form-label">Judul Surat</label>
                    <textarea wire:model="judul_surat" class="form-control <?php $__errorArgs = ['judul_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"></textarea>

                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['judul_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <div class="col-12">
                    <label class="form-label">Tanggal Surat</label>
                    <input type="date" wire:model="tanggal_surat"
                        class="form-control <?php $__errorArgs = ['tanggal_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tanggal_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <div
                    class="col-12">
                    <label class="form-label">Pilih Karyawan</label>
                    <div style="max-height: 300px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;"
                        class="rounded">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check">
                                <input class="form-check-input <?php $__errorArgs = ['selected_employees'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="checkbox" wire:model="selected_employees" value="<?php echo e($employee->id); ?>"
                                    id="employee-<?php echo e($employee->id); ?>">
                                <label class="form-check-label" for="employee-<?php echo e($employee->id); ?>">
                                    <?php echo e($employee->nama_pegawai); ?> | <?php echo e($employee->nip); ?>

                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['selected_employees'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <div class="col-12 <?php echo e($jenis_surat != 'daftar_hadir' ? 'd-none' : ''); ?>">
                    <label class="form-label">Ketua Tim Pelaksana</label>
                    <select wire:model.live="ketua_tim_pelaksana"
                        class="form-select <?php $__errorArgs = ['ketua_tim_pelaksana'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="">Pilih Ketua Tim Pelaksana</option>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->nama_pegawai); ?> |
                                <?php echo e($employee->nip); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>

                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['ketua_tim_pelaksana'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <div class="col-12 <?php echo e($jenis_surat != 'kuitansi' ? 'd-none' : ''); ?>">
                    <label class="form-label">Untuk Pembayaran</label>
                    <textarea wire:model="untuk_pembayaran" class="form-control <?php $__errorArgs = ['untuk_pembayaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"></textarea>

                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['untuk_pembayaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <div
                    class="col-12 <?php echo e($jenis_surat != 'daftar_nominatif' && $jenis_surat != 'kuitansi' ? 'd-none' : ''); ?>">
                    <label class="form-label">Pejabat Pembuat Komitmen</label>
                    <select wire:model.live="pejabat_pembuat_komitmen"
                        class="form-select <?php $__errorArgs = ['pejabat_pembuat_komitmen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="">Pilih Pejabat Pembuat Komitmen</option>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->nama_pegawai); ?> |
                                <?php echo e($employee->nip); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>

                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['pejabat_pembuat_komitmen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <div
                    class="col-12 <?php echo e($jenis_surat != 'daftar_nominatif' && $jenis_surat != 'kuitansi' ? 'd-none' : ''); ?>">
                    <label class="form-label">Bendahara</label>
                    <select wire:model.live="bendahara" class="form-select <?php $__errorArgs = ['bendahara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="">Pilih Bendahara</option>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->nama_pegawai); ?> |
                                <?php echo e($employee->nip); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>

                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['bendahara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
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
<?php /**PATH C:\xampp\htdocs\devi\resources\views/livewire/surat.blade.php ENDPATH**/ ?>