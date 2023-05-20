@extends('layouts.dashboard')

@section('title', 'Fuzzy Tsukamoto | SIM - KU ')

@section('content')

<div class="row mb-32 gy-32">
    <div class="col-12">
        <div class="row justify-content-between gy-32">
            <div class="col-12 col-lg-4">
                <h4 class="h4">Fuzzy Tsukamoto</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    {{-- ISI --}}
                    <div class="row g-0">
                        <div class="col-md-4">
                            <br>
                            <br>
                            <img class="card-img card-img-left" src="{{ asset('app-assets/img/illustrations/confused-anxious.jpg') }}" alt="Card image" style="width:100%;"/>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <br>
                            <h5 class="card-title">Logika Fuzzy</h5>
                            <p class="card-text">
                                Fuzzy Logic atau logika fuzzy merupakan cabang ilmu matematika yang mempunyai fungsi untuk memberikan pemodelan pemecahan masalah seperti yang dilakukan
                                manusia dengan bantuan teknologi komputer.
                                Fuzzy logic adalah suatu metode pemrograman komputer yang menggunakan konsep dari teori himpunan fuzzy untuk mengatasi ketidakpastian dan ambiguitas 
                                dalam data atau informasi. Fuzzy logic memungkinkan nilai-nilai yang tidak pasti atau tidak tepat untuk digunakan dalam pemrosesan data dan pengambilan keputusan.
                                </p>
                                <p>
                                    Fuzzy Logic berfungsi sebagai berikut:
                                </p>
                                <p>
                                    1. Menangani sebuah permasalahan yang impresisi / ketidaktepatan
                                </p>
                                <p>
                                    2. Logika fuzzy menjebatani antara bahasa mesin yang presisi dengan bahasa manusia yang menekankan kepada makna / arti
                                </p>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-md-6 col-lg-12 order-1 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4 class="card-title">Fungsi Keanggotaan Karbon Monoksida (CO)</h4>
                            </div>
                            <div class="card-body px-0">
                                <div class="tab-content p-0">
                                    <div class="tab-pane fade show active" id="" role="tabpanel">
                                        <div id="co"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-6 col-lg-12 order-1 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4 class="card-title">Fungsi Keanggotaan Amonia (NH3)</h4>
                            </div>
                            <div class="card-body px-0">
                            <div class="tab-content p-0">
                                <div class="tab-pane fade show active" id="" role="tabpanel">
                                <div id="nh3"></div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-6 col-lg-12 order-1 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4 class="card-title">Fungsi Keanggotaan Nitrogen Dioksida (NO2)</h4>
                            </div>
                            <div class="card-body px-0">
                                <div class="tab-content p-0">
                                <div class="tab-pane fade show active" id="" role="tabpanel">
                                    <div id="no2"></div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-6 col-lg-12 order-1 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4 class="card-title">Fungsi Keanggotaan Kualitas Udara ISPU</h4>
                            </div>
                            <div class="card-body px-0">
                                <div class="tab-content p-0">
                                <div class="tab-pane fade show active" id="" role="tabpanel">
                                    <div id="ispu"></div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('app-assets/js/chartsloader.js')}}"></script>
<script type="text/javascript">

google.charts.load('current', {
        packages: ['corechart', 'line']
    });

    function coChart() {
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string');
        data.addColumn('number', 'Rendah');
        data.addColumn('number', 'Sedang');
        data.addColumn('number', 'Tinggi');
        data.addRows([
          //biru, merah, kuning, ijo
            ['0', 1, 0, 0],
            ['10', 1, 0, 0],
            ['20', 0, 1, 0],
            ['40', 0, 1, 0],
            ['50', 0, 0, 1],
            ['57,5', 0, 0, 1],
          
        ]);

        // Set chart options
        var options = {

            hAxis: {
                title: 'Karbon Monoksida (CO)'
            },
            vAxis: {
                title: 'Nilai Keanggotaan'
            },
            'width': 1000,
            'height': 200,
            pointsVisible: true
        };

        // Instantiate and draw the chart.
        var chart = new google.visualization.LineChart(document.getElementById('co'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(coChart);

    function nh3Chart() {
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string');
        data.addColumn('number', 'Rendah');
        data.addColumn('number', 'Sedang');
        data.addColumn('number', 'Tinggi');
        data.addRows([
          //biru, merah, kuning, ijo
            ['0', 1, 0, 0],
            ['10', 1, 0, 0],
            ['20', 0, 1, 0],
            ['40', 0, 1, 0],
            ['50', 0, 0, 1],
            ['57,5', 0, 0, 1],
          
        ]);

        // Set chart options
        var options = {

            hAxis: {
                title: 'Amonia (NH3)'
            },
            vAxis: {
                title: 'Nilai Keanggotaan'
            },
            'width': 1000,
            'height': 200,
            pointsVisible: true
        };

        // Instantiate and draw the chart.
        var chart = new google.visualization.LineChart(document.getElementById('nh3'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(nh3Chart);

    function no2Chart() {
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string');
        data.addColumn('number', 'Rendah');
        data.addColumn('number', 'Sedang');
        data.addColumn('number', 'Tinggi');
        data.addRows([
          //biru, merah, kuning, ijo
            ['0', 1, 0, 0],
            ['10', 1, 0, 0],
            ['20', 0, 1, 0],
            ['40', 0, 1, 0],
            ['50', 0, 0, 1],
            ['57,5', 0, 0, 1],
          
        ]);

        // Set chart options
        var options = {

            hAxis: {
                title: 'Nitrogen Dioksida (NO2)'
            },
            vAxis: {
                title: 'Nilai Keanggotaan'
            },
            'width': 1000,
            'height': 200,
            pointsVisible: true
        };

        // Instantiate and draw the chart.
        var chart = new google.visualization.LineChart(document.getElementById('no2'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(no2Chart);

    function ispuChart() {
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string');
        data.addColumn('number', 'Baik');
        data.addColumn('number', 'Sedang');
        data.addColumn('number', 'Tidak Sehat');
        data.addColumn('number', 'Sangat Tidak Sehat');
        data.addColumn('number', 'Berbahaya');
        data.addRows([
          //biru, merah, kuning, ijo
            ['0', 0, 0, 0, 0, 0],
            ['50', 1, 0, 0, 0, 0],
            ['100', 0, 1, 0, 0, 0],
            ['200', 0, 0, 1, 0, 0],
            ['300', 0, 0, 0, 1, 0],
            ['350', 0, 0, 0, 0, 1],
          
        ]);

        // Set chart options
        var options = {

            hAxis: {
                title: 'Indeks Standar Pencemar Udara (ISPU)'
            },
            vAxis: {
                title: 'Nilai Keanggotaan'
            },
            'width': 1000,
            'height': 200,
            pointsVisible: true
        };

        // Instantiate and draw the chart.
        var chart = new google.visualization.LineChart(document.getElementById('ispu'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(ispuChart);

</script>
@endsection