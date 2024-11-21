@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Dashboard</h2>
            <div class="row">
                <!-- Card Total Laporan -->
                <div class="col-md-12">
                    <div class="card bg-success text-white mb-3">
                        <div class="card-body">
                            <h3>Jumlah Laporan</h3>
                            <h1>{{ $jumlahLaporan }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Rekap Laporan -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <h3>Rekap Laporan Per Bulan</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tahun</th>
                                <th>Bulan</th>
                                <th>Jumlah Laporan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rekapLaporan as $laporan)
                                <tr>
                                    <td>{{ $laporan->tahun }}</td>
                                    <td>{{ date('F', mktime(0, 0, 0, $laporan->bulan, 1)) }}</td>
                                    <td>{{ $laporan->jumlah_laporan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Grafik Rekap Laporan -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <h3>Grafik Rekap Laporan</h3>
                    <div id="rekapLaporanChart" style="width: 100%; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    // Data dari controller
    const chartData = @json($chartData);

    // Render grafik menggunakan Highcharts
    Highcharts.chart('rekapLaporanChart', {
        chart: {
            type: 'column' // Jenis grafik: bar (bisa diubah ke 'line' atau lainnya)
        },
        title: {
            text: 'Rekap Laporan Per Bulan'
        },
        xAxis: {
            categories: chartData.categories, // Label sumbu X (tahun-bulan)
            title: {
                text: 'Bulan'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Laporan'
            }
        },
        series: [{
            name: 'Jumlah Laporan',
            data: chartData.series, // Data jumlah laporan
            colorByPoint: true // Membuat setiap batang memiliki warna berbeda
        }],
        colors: ['#FF5733', '#33FF57', '#3357FF', '#FFC300', '#C70039', '#900C3F', '#581845'] // Menggunakan warna default Highcharts
    });
</script>
@endsection
