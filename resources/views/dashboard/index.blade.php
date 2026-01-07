@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Dashboard Laundry</h3>

    <div class="row mt-4">

        <div class="col-md-3">
            <div class="card text-center p-3 shadow-sm">
                <h5>Total Pesanan</h5>
                <h3>{{ $totalPesanan }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center p-3 shadow-sm">
                <h5>Pesanan Proses</h5>
                <h3>{{ $pesananProses }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center p-3 shadow-sm">
                <h5>Pesanan Selesai</h5>
                <h3>{{ $pesananSelesai }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center p-3 shadow-sm">
                <h5>Pendapatan Total</h5>
                <h3>Rp {{ number_format($pendapatanTotal) }}</h3>
            </div>
        </div>

    </div>

    <div class="card mt-4 p-4 shadow-sm">
        <h5>Grafik Pendapatan Mingguan</h5>
        <canvas id="grafikPendapatan"></canvas>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikPendapatan');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($grafik->pluck('tanggal')) !!},
            datasets: [{
                label: 'Pendapatan',
                data: {!! json_encode($grafik->pluck('total')) !!},
                borderWidth: 2,
            }]
        }
    });
</script>
@endsection
