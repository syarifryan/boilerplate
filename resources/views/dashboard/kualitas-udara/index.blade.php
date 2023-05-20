@extends('layouts.dashboard')

@section('title', 'Kualitas Udara | SIM - KU ')

@section('content')

<div class="row mb-32 gy-32">
    <div class="col-12">
        <div class="row justify-content-between gy-32">
            <div class="col-12 col-lg-4">
                <h3 class="h3">Kualitas Udara</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="mt-12 text-center">
                        <h4 class="h4">Kualitas Udara di Indonesia</h4>
                    </div>
                    <div class="text-right">
                        <h6>Karbon Monoksida (CO)</h6>
                    </div>
                    <div class="text-right">
                        <p>
                            Amonia merupakan senyawa kimia dengan rumus NH3 yang salah satu indikator pencemaran udara pada bentuk kebauan. Gas amonia sendiri suatu gas yang tidak 
                            berwarna dengan bau menyengat, biasanya amonia berasal dari aktivitas mikroba, industry amonia, pengolahan limbah dan pengolahan batu bara. Amonia di atmosfer 
                            berasal dari berbagai sumber, antara lain berasal dari dekomposisi kotoran, industry pembuatan pupuk, dan penggunaan pupuk. Salah satu dampak yang timbul terhadap 
                            kesehatan manusia jika terpapar gas ammonia yang tinggi atau diatas 50 ppm dapat mengakibatkan iritasi pada mata dan hidung, iritasi tenggorokan, batuk, nyeri dada hingga sesak nafas.
                        </p>
                    </div>
                    <div class="text-right">
                        <h6>Amonia (NH3)</h6>
                    </div>
                    <div class="text-right">
                        <p>
                            Amonia merupakan senyawa kimia dengan rumus NH3 yang salah satu indikator pencemaran udara pada bentuk kebauan. Gas amonia sendiri suatu gas yang tidak 
                            berwarna dengan bau menyengat, biasanya amonia berasal dari aktivitas mikroba, industry amonia, pengolahan limbah dan pengolahan batu bara. Amonia di atmosfer 
                            berasal dari berbagai sumber, antara lain berasal dari dekomposisi kotoran, industry pembuatan pupuk, dan penggunaan pupuk. Salah satu dampak yang timbul terhadap 
                            kesehatan manusia jika terpapar gas ammonia yang tinggi atau diatas 50 ppm dapat mengakibatkan iritasi pada mata dan hidung, iritasi tenggorokan, batuk, nyeri dada hingga sesak nafas.
                        </p>
                    </div>
                    <div class="text-right">
                        <h6>Nitrogen Dioksida (NO2)</h6>
                    </div>
                    <div class="text-right">
                        <p>
                            Amonia merupakan senyawa kimia dengan rumus NH3 yang salah satu indikator pencemaran udara pada bentuk kebauan. Gas amonia sendiri suatu gas yang tidak 
                            berwarna dengan bau menyengat, biasanya amonia berasal dari aktivitas mikroba, industry amonia, pengolahan limbah dan pengolahan batu bara. Amonia di atmosfer 
                            berasal dari berbagai sumber, antara lain berasal dari dekomposisi kotoran, industry pembuatan pupuk, dan penggunaan pupuk. Salah satu dampak yang timbul terhadap 
                            kesehatan manusia jika terpapar gas ammonia yang tinggi atau diatas 50 ppm dapat mengakibatkan iritasi pada mata dan hidung, iritasi tenggorokan, batuk, nyeri dada hingga sesak nafas.
                        </p>
                    </div>
                    <br>
                    <div class="mt-12 text-center">
                        <h4 class="h4">Indeks Standar Pencemar Udara (ISPU)</h4>
                    </div>
                    <div class="row g-0">
                        <div class="col-md-6 ">
                            <img class="card-img card-img-left" src="{{ asset('app-assets/img/illustrations/people-illustration.png') }}" alt="Card image" style="width: 70%"/>
                        </div>
                        <div class="col-md-6">
                            <p>
                                Indeks Standar Pencemar Udara yang selanjutnya disingkat ISPU adalah angka yang tidak mempunyai satuan yang menggambarkan kondisi mutu udara ambien 
                                di lokasi tertentu, yang didasarkan kepada dampak terhadap kesehatan manusia, nilai estetika dan makhluk hidup lainnya.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <img class="card-img card-img-center " src="{{ asset('app-assets/img/tabel/tabel_ispu.png') }}" alt="Card image" style="width:50%" />
                    </div>
                    <p class="text-center">
                        Tabel Indeks Standar Pencemar Udara (ISPU)
                    </p>
                    <br>
                    <div class="d-flex justify-content-center">
                        <img class="" src="{{ asset('app-assets/img/tabel/tabel_penjelasan_ispu.png') }}" alt="Card image" style="width:50%" />
                    </div>
                    <p class="text-center">
                        Tabel Penjelasan Indeks Standar Pencemar Udara (ISPU)
                    </p>

                   
                </div> 
            </div> 
        </div>
    </div>
</div>
@endsection