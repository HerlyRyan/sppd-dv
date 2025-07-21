@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">Grafik Perbandingan SKP Antar Pegawai</div>
                <div class="col d-flex justify-content-end">

                    <a href="{{ route('laporan.grafik-skp.print') }}" target="_blank" class="btn btn-primary">Cetak</a>
                </div>
            </div>
            <form method="GET" action="{{ route('laporan.grafik-skp.index') }}" class="mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <select name="tahun" class="form-control" onchange="this.form.submit()">
                            <option value="">Semua Tahun</option>
                            @foreach ($tahunList as $tahun)
                                <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                    {{ $tahun }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <canvas id="skpChart"></canvas>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const skpData = @json($data);

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
@endpush
