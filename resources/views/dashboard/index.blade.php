@extends('layouts.dashboard')

@section('title', 'Dashboard | SIM - KU')

@section('content')
<div class="col-12">

    <div class="col-lg-12 mb-8 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang, di Website HI-Tech 
                        </h5>
                        <p class="mb-8">
                            Website ini berisikan artikel-artikel informasi terkait teknologi-teknologi terbaru
                        </p>
                        <a href="{{route('dashboard.article.index')}}" class="btn btn-sm btn-outline-primary">Lihat Artikel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/chartsloader.js') }}"></script>
    <script type="text/javascript">
       
    </script>

@endsection

