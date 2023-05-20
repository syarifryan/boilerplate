@extends('layouts.dashboard')

@section('title', 'Sensor | SIM - KU ')

@section('content')

<div class="row mb-32 gy-32">
    <div class="col-12">
        <div class="row justify-content-between gy-32">
            <div class="col-12 col-lg-4">
                <h3 class="h3">Sensor</h3>
            </div>
            <div class="card">
                <h4 class="text-center mt-24">Penjelasan Sensor</h4>
                <div class="col-md">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img class="card-img card-img-left" src="{{ asset('app-assets/img/sensor/mq7new.jpeg') }}" alt="Card image" style="padding: 14px"/>
                        </div>
                        <div class="col-md-7 mt-48">
                            <div class="card-body">
                                
                            <h5 class="card-title">Sensor MQ - 7</h5>
                            <p class="card-text">
                                Sensor MQ-7 adalah sensor gas karbon monoksida (CO) yang dapat mendeteksi konsentrasi gas CO dalam udara.
                                Sensor MQ-7 dapat mendeteksi konsentrasi gas karbon monoksida (CO) dalam udara. Sensor ini bekerja dengan mengukur 
                                perubahan resistansi pada elemen sensor saat terpapar oleh gas CO. Semakin tinggi konsentrasi gas CO dalam udara, maka resistansi pada sensor semakin menurun. 
                                Konsentrasi gas CO dapat diukur dalam satuan parts per million (ppm). 
                                Sensor MQ-7 cukup sensitif dan mudah digunakan, namun perlu diperhatikan agar tidak terpapar langsung oleh gas CO yang berbahaya bagi kesehatan.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img class="card-img card-img-left" src="{{ asset('app-assets/img/sensor/mq135new.jpg') }}" alt="Card image" style="padding: 50px"/>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <br><br><br><br>
                            <h5 class="card-title">Sensor MQ - 135</h5>
                            <p class="card-text">
                                Sensor MQ-135 adalah sensor gas yang dapat mendeteksi konsentrasi beberapa jenis gas dalam udara seperti amonia (NH3), nitrogen dioksida (NO2), 
                                benzena, asap, dan gas karbon dioksida (CO2). Sensor ini bekerja dengan prinsip perubahan resistansi pada elemen sensor saat terpapar oleh gas. 
                                Semakin tinggi konsentrasi gas dalam udara, maka resistansi pada sensor semakin menurun. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection