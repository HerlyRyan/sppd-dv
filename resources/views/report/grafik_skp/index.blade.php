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

        const labels = skpData.map(item => item.nama_pegawai);
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
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
