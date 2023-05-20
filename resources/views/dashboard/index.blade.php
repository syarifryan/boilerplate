@extends('layouts.dashboard')

@section('title', 'Dashboard | SIM - KU')

@section('content')
<div class="col-12">

    <div class="col-lg-12 mb-8 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang, di Sistem Monitoring Kualitas Udara 
                        </h5>
                        <p class="mb-8">
                            Sistem ini digunakan untuk memantau dan menghitung kualitas udara dengan pada sektor
                            pertanian dengan menggunakan metode Fuzzy Tsukamoto
                        </p>
                        <a href="{{ route('dashboard.proses.index')}}" class="btn btn-sm btn-outline-primary">Proses Kualitas Udara</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row g-32 mb-24">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row g-16">
                        <div class="col-6 hp-flex-none w-auto">
                            <div class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-primary-4 hp-bg-color-dark-primary rounded-circle">
                                <i class="iconly-Light-Chart text-primary hp-text-color-dark-primary-2" style="font-size: 24px;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4 mt-8">{{$sensor->co ?? '-'}} ppm</h3>
                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">CO</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row g-16">
                        <div class="col-6 hp-flex-none w-auto">
                            <div class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-warning-4 hp-bg-color-dark-warning rounded-circle">
                                <i class="iconly-Light-Chart text-warning" style="font-size: 24px;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4 mt-8">{{$sensor->nh3 ?? '-'}} ppm</h3>
                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">NH3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row g-16">
                        <div class="col-6 hp-flex-none w-auto">
                            <div class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-secondary-4 hp-bg-color-dark-secondary rounded-circle">
                                <i class="iconly-Light-Chart text-secondary" style="font-size: 24px;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4 mt-8">{{$sensor->no2 ?? '-'}} ppm</h3>
                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">NO2</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-24">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title-header mb-24">
                        <h6 class="fw-bold">Grafik Karbon Monoksida (CO)</h6>
                        <div class="row d-flex justify-content-end mb-24">
                            <div class="hp-flex-none w-auto">
                            </div>
                        </div>
                    </div>
                    <div id="co-chart"></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12 mb-24">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title-header mb-24">
                        <h6 class="fw-bold">Grafik Amonia (NH3)</h6>
                    </div>
                    <div id="nh3-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-24">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title-header mb-24">
                        <h6 class="fw-bold">Grafik Nitrogen Dioksida (NO2)</h6>
                        <div class="row d-flex justify-content-end mb-24">
                            <div class="hp-flex-none w-auto">
                            </div>
                        </div>
                    </div>
                    <div id="no2-chart" class="overflow-hidden"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/chartsloader.js') }}"></script>
    <script type="text/javascript">
        //buatkan google chart
        google.charts.load('current', {
            packages: ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(tampilkanGrafik);

        //buatkan fungsi ajax untuk mengambil data dari database
        function tampilkanGrafik() {
            var datajson = $.ajax({
                url: "{{ route('get-data-sensor-all') }}",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    // tampilkan data kedalam chart
                    tampilkanChartCO(data)
                    tampilkanChartNH3(data)
                    tampilkanChartNO2(data)

                }
            });

            function tampilkanChartCO(data) {
                var dataCO = new google.visualization.DataTable();
                dataCO.addColumn('string', 'Tanggal');
                dataCO.addColumn('number', 'CO');
                // console.log("ini data chart",dataCO);
                for (var i = 0; i < data.length; i++) {
                    dataCO.addRow([data[i].created_at, parseFloat(data[i].co)]);
                }
                var options = {

                    hAxis: {
                        title: 'Tanggal'
                    },
                    vAxis: {
                        title: 'CO '
                    },

                    'height': 280,
                    pointsVisible: true
                };
                var chart = new google.visualization.LineChart(document.getElementById('co-chart'));
                chart.draw(dataCO, options);
            }

            function tampilkanChartNH3(data) {
                var dataNH3 = new google.visualization.DataTable();
                dataNH3.addColumn('string', 'Tanggal');
                dataNH3.addColumn('number', 'NH3');
                // console.log("ini data chart",dataNH3);
                for (var i = 0; i < data.length; i++) {
                    dataNH3.addRow([data[i].created_at, parseFloat(data[i].nh3)]);
                }
                var options = {

                    hAxis: {
                        title: 'Tanggal'
                    },
                    vAxis: {
                        title: 'NH3'
                    },

                    'height': 280,
                    pointsVisible: true
                };
                var chart = new google.visualization.LineChart(document.getElementById('nh3-chart'));
                chart.draw(dataNH3, options);
            }

            function tampilkanChartNO2(data) {
                var dataNO2 = new google.visualization.DataTable();
                dataNO2.addColumn('string', 'Tanggal');
                dataNO2.addColumn('number', 'NO2');
                // console.log("ini data chart",dataNO2);
                for (var i = 0; i < data.length; i++) {
                    dataNO2.addRow([data[i].created_at, parseFloat(data[i].no2)]);
                }
                var options = {

                    hAxis: {
                        title: 'Tanggal'
                    },
                    vAxis: {
                        title: 'NO2'
                    },

                    'height': 280,
                    pointsVisible: true
                };
                var chart = new google.visualization.LineChart(document.getElementById('no2-chart'));
                chart.draw(dataNO2, options);
            }


        }

        // fetch data sensor setiap 5 detik
        setInterval(function() {
            tampilkanGrafik();
        }, 10000);
    </script>

@endsection

