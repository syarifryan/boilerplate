@extends('layouts.dashboard')

@section('title', 'Proses | SIM - KU ')

@section('content')

<div class="row mb-32 gy-32">
    <div class="col-12">
        <div class="row justify-content-between gy-32">
            <div class="col-12 col-md-4">
                <h3 class="h3">Proses</h3>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 g-8 justify-content-end">
                            <h4>Pengujian Kualitas Udara</h4>
                            <div class="row d-flex justify-content-end mb-24">
                                <p>Berdasarkan Karbon Monoksida (CO) Amonia (NH3) dan Nitrogen Dioksida (NO2)</p>
                                <div class="col hp-flex-none w-auto">
                              
                                </div>
                                {{-- <div class="col hp-flex-none w-auto">
                                    <button type="button" class="btn btn-primary w-100" onclick="saveData();">
                                        <span>Mulai Pengujian Kualitas Udara</span>
                                    </button>
                                </div> --}}
                                <div class="col hp-flex-none w-auto">
                                    <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalTambahISPU" id="btn-pengujian">Mulai Pengujian Kualitas Udara</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div > --}}
        <div class="card mb-12">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="tab-content">
                    {{-- visitor --}}
                    <div class="tab-pane active" id="visitor">
                        <div class="table-responsive">
                            <table class="table align-middle table-hover table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Karbon Monoksida (CO)</th>
                                        <th scope="col">Amonia (NH3)</th>
                                        <th scope="col">Nitrogen Dioksida (NO2)</th>
                                        <th scope="col">Nilai Output</th>
                                        <th scope="col">ISPU</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                @forelse ($proses as $item)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td> {{ $item->updated_at }} </td>
                                        <td> {{ $item->co }} </td>
                                        <td> {{ $item->nh3 }} </td>
                                        <td> {{ $item->no2 }} </td>
                                        <td> {{ $item->defuzzy }} </td>
                                        <td> {{ $item->grade }} </td>
                                        <td>
                                            <button onclick="detailData({{$item->id}})" class="btn btn-text text-primary btn-sm"
                                            title="Detail">
                                            <i class="iconly-Light-Show"></i>
                                        </button>
                                    </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
    {{-- Detail Proses  --}}
    <div class="modal fade" id="modalTambahISPU" tabindex="-1" aria-labelledby="modalTambahISPU"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- @csrf --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahISPU">Manage ISPU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="formISPU" action="{{route('dashboard.proses.store')}}">
                    @csrf
                    <div class="modal-body">
                        {{-- <input type="text" id="id" name="id" class="kontraktor" hidden> --}}
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="co" class="col-sm-3 mb-0">Karbon Monoksida (CO)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control co" id="last-co"
                                    name="co" readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="nh3" class="col-sm-3 mb-0">Amonia (NH3)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control nh3" id="last-nh3"
                                    name="nh3" readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="no2" class="col-sm-3 mb-0">Nitrogen Dioksida (NO2)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control no2" id="last-no2"
                                    name="no2" readonly required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="date" class="col-sm-3 mb-0">Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" id="last-date"
                                        name="date" readonly required>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer pt-0 px-24 pb-24">
                        <div class="divider"></div>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    {{-- Detail ISPU  --}}



    <div class="modal fade" id="modalDetailISPU" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- @csrf --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailISPU">Manage ISPU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <form method="POST" id="formISPU" action="{{route('dashboard.proses.store')}}"> --}}
                    {{-- @csrf --}}
                    <div class="modal-body">
                        {{-- <input type="text" id="id" name="id" class="kontraktor" hidden> --}}
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="date" class="col-sm-3 mb-0">Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" id="date"
                                    readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="co" class="col-sm-3 mb-0">Karbon Monoksida (CO)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control co" id="co"
                                    readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="nh3" class="col-sm-3 mb-0">Amonia (NH3)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control nh3" id="nh3"
                                    readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="no2" class="col-sm-3 mb-0">Nitrogen Dioksida (NO2)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control no2" id="no2"
                                    readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="no2" class="col-sm-3 mb-0">Nilai Output</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control no2" id="nilai_output"
                                    readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="no2" class="col-sm-3 mb-0">ISPU</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control no2" id="grade_output"
                                    readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-12">
                            <div class="row align-items-center">
                                <label for="no2" class="col-sm-3 mb-0">Penanganan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control no2" id="penanganan"
                                    readonly required>
                                </div>
                            </div>
                        </div>

                        
                        
                    </div>
                    <div class="modal-footer pt-0 px-24 pb-24">
                        <div class="divider"></div>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                            {{-- <button type="submit" class="btn btn-primary">Proses</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    

<script>
    $(document).on("click", "#btn-pengujian", function() {
        // Mendapatkan id data terakhir dari API
        $.ajax({
            url: "{{ route('get-one-last-data-sensor') }}",
            type: "GET",
            dataType: "json",
            success: function(data) {
                // Mengisi data terakhir ke dalam field input
                $("#last-co").val(data.co);
                $("#last-nh3").val(data.nh3);
                $("#last-no2").val(data.no2);
                $("#last-date").val(data.updated_at);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });

    function fillDetailData(response = null) {
        console.log(response)
        $("#id").val(response.id.toString());
        $("#date").val(response.updated_at);
        $("#co").val(response.co);
        $("#no2").val(response.no2);
        $("#nh3").val(response.nh3);
        $("#nilai_output").val(response.defuzzy);
        $("#grade_output").val(response.grade);
        $("#penanganan").val(response.handle_id.penanganan);
    }

    function detailData(id = null) {
        if (id != null) {
            $.ajax({
                url: "{{route('dashboard.proses.show', ':id')}}".replace(":id", id),
                type: "GET",
                success: function (res) {
                    fillDetailData(res);
                }
            });
        }
        $('.btn-edit').show();
        $('.btn-delete').show();
        $('.btn-save').hide();
        $('.btn-update').hide();
        $(".modal-body :input").prop("disabled", true);
        $('#modalDetailISPU').modal('show');
    }
</script>




@endsection