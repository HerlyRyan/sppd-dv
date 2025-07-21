

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">Grafik Perbandingan SKP Antar Pegawai</div>
                <div class="col d-flex justify-content-end">

                    <a href="<?php echo e(route('laporan.grafik-skp.print')); ?>" target="_blank" class="btn btn-primary">Cetak</a>
                </div>
            </div>
            <form method="GET" action="<?php echo e(route('laporan.grafik-skp.index')); ?>" class="mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <select name="tahun" class="form-control" onchange="this.form.submit()">
                            <option value="">Semua Tahun</option>
                            <?php $__currentLoopData = $tahunList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tahun); ?>" <?php echo e(request('tahun') == $tahun ? 'selected' : ''); ?>>
                                    <?php echo e($tahun); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <canvas id="skpChart"></canvas>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const skpData = <?php echo json_encode($data, 15, 512) ?>;

        const labels = skpData.map(item => item.unit_kerja);
        console.log()
        const values = skpData.map(item => item.total_skp);

        const ctx = document.getElementById('skpChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah SKP',
                    data: values,
                    backgroundColor: '#4e73df',
                    borderColor: '#4e73df',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            callback: function(value, index, ticks) {
                                const label = this.chart.data.labels[index];
                                const words = label.split(' ');
                                const lines = [];

                                // Gabungkan tiap 2 kata jadi satu baris
                                for (let i = 0; i < words.length; i += 2) {
                                    lines.push(words.slice(i, i + 2).join(' '));
                                }

                                return lines;
                            }
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devi\resources\views/report/grafik_skp/index.blade.php ENDPATH**/ ?>