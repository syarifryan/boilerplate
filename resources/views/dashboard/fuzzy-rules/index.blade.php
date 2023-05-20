@extends('layouts.dashboard')

@section('title', 'Fuzzy Rules | SIM - KU ')

@section('content')
<div class="row mb-32 gy-32">
    <div class="col-12">
        <div class="row justify-content-between gy-32">
            <div class="col-12 col-lg-4">
                <h4 class="h4">Fuzzy Rules</h4>
            </div>
            <div class="col-12 col-lg-7">
                <div class="row g-16 align-items-center justify-content-end">
                    {{-- <div class="col-12 col-lg-6 col-xl-4">
                        <form action="{{route('dashboard.fuzzy-rules.index')}}" method="get">
                            <div class="input-group align-items-center">
                                <span class="input-group-text bg-white hp-bg-dark-100 border-end-0 pe-0">
                                    <i class="iconly-Light-Search text-black-80" style="font-size: 16px;"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-8" name="search" id="search"
                                    value="{{request('search')??''}}" placeholder="Search">
                            </div>
                        </form>
                    </div> --}}
                    @can('rules-add')
                    <div class="col hp-flex-none w-auto">
                        <button type="button" class="btn btn-primary w-100" onclick="saveData();">
                            <i class="ri-add-line remix-icon"></i>
                            <span>Add Rules</span>
                        </button>
                    </div>
                    @endcan
                    <div class="col hp-flex-none w-auto">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#importRules">
                            Import Rules
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
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
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-hover table-borderless">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Karbon Monoksida (CO)</th>
                                <th>Amonia (NH3)</th>
                                <th>Nitrogen Dioksida (NO2)</th>
                                <th>ISPU</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data as $item)
                            <tr>
                                <td class="nr"></td>
                                <td>
                                    {{$item->co}}
                                </td>
                                <td>
                                    {{$item->nh3}}
                                </td>
                                <td>
                                    {{$item->no2}}
                                </td>
                                <td>
                                    {{$item->grade}}
                                </td>
                                @can('rules-update')
                                <td>
                                        <button onclick="detailData({{$item->id}})" class="btn btn-text text-primary btn-sm"
                                        title="Detail">
                                        <i class="iconly-Light-Show"></i>
                                    </button>
                                </td>
                                 @endcan
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                
                <div>
                     {{-- {{$data->link}}s("pagination::bootstrap-4")}} --}}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-16 px-24">
                <h5 class="modal-title" id="modalDataLabel">Manage Rules</h5>
                <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                </button>
            </div>

            <div class="divider m-0"></div>

            <form id="formData" method="POST" enctype="multipart/form-data" action="{{route('dashboard.fuzzy-rules.store')}}">

                @csrf
                <div id="method">
                    @method("POST")
                </div>
                <div class="modal-body">
                <input type="number" hidden>
                    <input type="text" id="id" hidden>
                    <div class="row gx-8">
                        <div class="col-12 col-md-12">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                   Karbon Monoksida (CO)
                                </label>
                                <select class="form-select" name="co" id="co">
                                    <option disabled selected>--- Pilih ---</option>
                                    <option value="Rendah">Rendah</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Tinggi">Tinggi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                   Nitrogen Dioksida (NO2)
                                </label>
                                <select class="form-select" name="no2" id="no2">
                                    <option disabled selected>--- Pilih ---</option>
                                    <option value="Rendah">Rendah</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Tinggi">Tinggi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                   Amonia (NH3)
                                </label>
                                <select class="form-select" name="nh3" id="nh3">
                                    <option disabled selected>--- Pilih ---</option>
                                    <option value="Rendah">Rendah</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Tinggi">Tinggi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                   ISPU
                                </label>
                                <select class="form-select" name="grade" id="grade">
                                    <option disabled selected>--- Pilih ---</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Tidak Sehat">Tidak Sehat</option>
                                    <option value="Sangat Tidak Sehat">Sangat Tidak Sehat</option>
                                    <option value="Berbahaya">Berbahaya</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer pt-0 px-24 pb-24">
                    <div class="divider"></div>
                    <div class="d-flex justify-content-between w-100">
                        <div>
                            @can('rules-delete')
                            <button type="button" onclick="deleteData()" class="btn btn-danger btn-delete" >Delete</button>
                            @endcan
                        </div>
                        <div>
                            <button type="button" class="btn btn-text btn-cancel"
                                data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-save">Save</button>
                                @can('rules-update')
                                <button type="button" class="btn btn-success btn-edit" onclick="editData()">Edit</button>
                                <button type="button" class="btn btn-primary btn-update" onclick="updateData()">Update</button>
                                @endcan
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Import Rules -->
<div class="modal fade" id="importRules" tabindex="-1" aria-labelledby="importRules"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="importrules">Import Rules</h5>
            <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center"
                data-bs-dismiss="modal" aria-label="Close">
                <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
            </button>
        </div>
        <form action="{{ route('dashboard.fuzzy-rules.import_rules') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <h5>Import menggunakan format excel</h5>
                <ul>
                    <li>- Download Template</li>
                    <li>- Isi Template</li>
                    <li>- Upload Kembali</li>
                </ul>
                <hr>
                <h5>Download Template</h5>
                <a href="{{ asset('file/rules/sample_upload_file_rules.xlsx') }}" role="button"
                    class="btn btn-primary popover-test col-12" data-bs-toggle="popover" title="Popover title"
                    data-bs-content="Popover body content is set in this attribute.">Download</a>
                <hr>
                <h5>Upload Data</h5>
                <div class="input-group mb-24">
                    <input type="file" class="form-control" name="file_csv" id="file_csv"
                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                        required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-text" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection


@section('js')
<script src="{{asset('app-assets/js/slug.js')}}"></script>
<script src="{{asset('app-assets/js/tinymce.min.js')}}"></script>
<script src="{{asset('app-assets/js/wysiwg.js')}}"></script>

<script>
    let loading = '<div class="spinner-border spinner-border-sm ml-3" role="status"></div>'

    let csrf_token = $('meta[name="csrf-token"]').attr('content');

    function resetModalState() {
        $("#co").val("");
        $("#no2").val("");
        $("#nh3").val("");
        $("#grade").val("");

    };
    $("#modalData").on("hidden.bs.modal", function () {
        resetModalState();
    });

    function saveData() {
        $('.btn-edit').hide();
        $('.btn-delete').hide();
        $('.btn-update').hide();
        $('.btn-save').show();
        $('#modalData').modal('show');
        $(".modal-body :input").prop("disabled", false);
    }

    function fillDetailData(response = null) {
        console.log(response)
        $("#id").val(response.id.toString());
        $("#co").val(response.co);
        $("#no2").val(response.no2);
        $("#nh3").val(response.nh3);
        $("#grade").val(response.grade);
    }

    function detailData(id = null) {
        if (id != null) {
            $.ajax({
                url: "{{route('dashboard.fuzzy-rules.show', ':id')}}".replace(":id", id),
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
        $('#modalData').modal('show');
    }

    function editData() {
        $(".modal-body :input").prop("disabled", false);
        $('.btn-edit').hide();
        $('.btn-delete').hide();
        $('.btn-save').hide();
        $('.btn-update').show();
        $("[name='picture']").prop("required", false)
    }

    function updateData() {
        const id = $("#id").val();
        if (id != null && id != undefined) {
            $(".btn-update").append(loading);
            $("#formData").attr("method", "POST");
            $("#formData").attr("action", "{{route('dashboard.fuzzy-rules.update', ':id')}}".replace(":id", id));
            $("#method").html(`@method('PUT')`);
            $("#formData").submit();
        } else {
            alert("Cannot update data, id not found");
        }
    }

    function deleteData() {
        var result = confirm("Want to delete?");
        if (result) {
            const id = $("#id").val();
            if (id != null && id != undefined) {
                $(".btn-delete").append(loading);
                $("#formData").attr("method", "POST");
                $("#formData").attr("action", "{{route('dashboard.fuzzy-rules.destroy', ':id')}}".replace(":id", id));
                $("#method").html(`@method('delete')`);
                $("#formData").submit();

            } else {
                alert("Cannot update data, id not found");
            }
        }
    }


    //Disabled Double Click
    $(".btn-save").one('click', function (event) {
        event.preventDefault();
        $(".btn-save").append(loading)
        $(this).prop('disabled', true);
        $('form#formData').submit();
     });

     //nr
    var a = document.getElementsByClassName("nr");
    for (var i = 0; i < a.length; i++) {
        a[i].innerHTML = (i+1);
    }

</script>
@endsection
