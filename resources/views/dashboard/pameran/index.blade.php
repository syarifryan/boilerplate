@extends('layouts.dashboard')

@section('title', 'Pameran | Jidoka.id ')

@section('content')
<div class="row mb-32 gy-32">
    <div class="col-12">
        <div class="row justify-content-between gy-32">
            <div class="col-12 col-lg-4">
                <h4 class="h4">Pameran</h4>
            </div>
            <div class="col-12 col-lg-7">
                <div class="row g-16 align-items-center justify-content-end">
                    <div class="col-12 col-lg-6 col-xl-4">
                        <form action="{{route('dashboard.pameran.index')}}" method="get">
                            <div class="input-group align-items-center">
                                <span class="input-group-text bg-white hp-bg-dark-100 border-end-0 pe-0">
                                    <i class="iconly-Light-Search text-black-80" style="font-size: 16px;"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-8" name="search" id="search"
                                    value="{{request('search')??''}}" placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <div class="col hp-flex-none w-auto">
                        <button type="button" class="btn btn-primary w-100" onclick="saveData();">
                            <i class="ri-add-line remix-icon"></i>
                            <span>Add Pameran</span>
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
                                <th>Nama Pameran</th>
                                <th>Deskripsi</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Nama Pembuat</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data as $item)

                            <tr>
                                <td class="nr"></td>
                                <td>
                                    {{$item->nama_pameran}}
                                </td>
                                <td>
                                    {{$item->deskripsi}}
                                </td>
                                <td>
                                    {{$item->start_date}}
                                </td>
                                <td>
                                    {{$item->end_date ?? "Unlimited"}}
                                </td>
                                <td>
                                     {{$item->user->name}}
                                </td>
                                @can('pameran-update')
                                <td class="text-end">
                                    <button onclick="detailData({{$item->id}})" class="btn btn-text text-primary btn-sm"
                                        title="Detail">
                                        <i class="iconly-Light-Show"></i>
                                    </button>
                                </td>
                                 @endcan
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="col-12 mt-12">
                    <div class="d-flex justify-content-between mb-32">
                        <p>Menampilkan 1 sampai 10 dari 1 entri</p>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mr-6">
                                <li class="page-item">
                                    <a class="page-link" href="javascript:;" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:;" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
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
                <h5 class="modal-title" id="modalDataLabel">Manage Pameran</h5>
                <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                </button>
            </div>

            <div class="divider m-0"></div>

            <form id="formData" method="POST" enctype="multipart/form-data" action="{{route('dashboard.pameran.store')}}">

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
                                    Nama Pameran
                                </label>
                                <input type="text" class="form-control" id="nama_pameran" name="nama_pameran" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-12">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Deskripsi
                                </label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" >
                            </div>
                        </div>

                        <div class="col-12 col-md-12">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Start Date
                                </label>
                                <div class="input-group mb-3">
                                <input type="date" class="form-control start-date" name="start_date" id="start_date" required>
                                <button type="button" class="btn btn-outline-primary clear-start-date">Clear</button>
                            </div>
                        </div>
                    </div>


                        <div class="col-12 col-md-12">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4"></span>
                                    End Date
                                </label>

                                <div class="input-group mb-3">
                                    <input type="date" class="form-control end-date" name="end_date"id="end_date">
                                    <button type="button" class="btn btn-outline-primary clear-end-date">Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer pt-0 px-24 pb-24">
                    <div class="divider"></div>
                    <div class="d-flex justify-content-between w-100">
                        <div>
                            @can('pameran-delete')
                            <button type="button" onclick="deleteData()" class="btn btn-danger btn-delete" >Delete</button>
                            @endcan
                        </div>
                        <div>
                            <button type="button" class="btn btn-text btn-cancel"
                                data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-save">Save</button>
                                @can('pameran-update')
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
@endsection

@section('js')
<script src="{{asset('app-assets/js/slug.js')}}"></script>
<script src="{{asset('app-assets/js/tinymce.min.js')}}"></script>
<script src="{{asset('app-assets/js/wysiwg.js')}}"></script>

<script>
    let loading = '<div class="spinner-border spinner-border-sm ml-3" role="status"></div>'

    let csrf_token = $('meta[name="csrf-token"]').attr('content');

    function resetModalState() {
        $("#start_date").val("");
        $("#end_date").val("");
        $("#nama_pameran").val("");
        $("#deskripsi").val("");

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
        $("#start_date").val(response.start_date.replace(" ", "T"));
        $("#end_date").val(response.end_date.replace(" ", "T"));
        $("#nama_pameran").val(response.nama_pameran);
        $("#deskripsi").val(response.deskripsi);
    }

    function detailData(id = null) {
        if (id != null) {
            $.ajax({
                url: "{{route('dashboard.pameran.show', ':id')}}".replace(":id", id),
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
            $("#formData").attr("action", "{{route('dashboard.pameran.update', ':id')}}".replace(":id", id));
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
                $("#formData").attr("action", "{{route('dashboard.pameran.destroy', ':id')}}".replace(":id", id));
                $("#method").html(`@method('delete')`);
                $("#formData").submit();

            } else {
                alert("Cannot update data, id not found");
            }
        }
    }


    $(".start-date").change(function () {
        $(".end-date").val("");
        $(".end-date").attr("min", $(".start-date").val());
    });

    $(".clear-end-date").click(function(){
        $(".end-date").val("")
    });

    $(".clear-start-date").click(function(){
        $(".start-date").val("")
    });

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
