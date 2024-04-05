@extends('layouts.indexpanel')
@section('breadcrumb')
    {{ Breadcrumbs::render('admin_lists') }}

@endsection
@section('title')
    جزئیات مدرس
@endsection
@section('button')

@endsection
@section('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function save_teacher(id){
            var token = localStorage.getItem('Token');

            $.ajax({
                url:"/api/admin/percent_teacher/{{ $teacher->user_id }}",
                type:"post",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader ("Authorization", "Bearer " + token);
                },
                data:{
                    "_token" : "{{ csrf_token() }}",
                    "_method" : "PUT",
                    money:$('#money').val()
                },
                success:function (){
                    Swal.fire({
                        title: 'موفقیت آمیز',
                        text: "باموفقیت ثبت شد",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'باشه'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = "/admin/teacher_list"
                        }
                    })
                }
            })

        }

    </script>
@endsection
@section('csspanel')
    <link rel="stylesheet" type="text/css" href="{{ url('../../panelstyle/app-assets/css-rtl/pages/data-list-view.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panelstyle/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <style>
        table#tblData {
            width: 100%!important;
        }
        tr.odd td {
            text-align: justify!important;
        }
        button.swal2-confirm.btn.btn-success {
            margin-right: 6px;
        }
    </style>
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        جزئیات مدرس
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            شماره کارت :
                            <br>
                            {{ $teacher->card_number }}
                        </div>
                        <div class="col-lg-6">
                            شماره شبا :
                            <br>
                            {{ $teacher->shaba_number }}
                        </div>
                        <div class="col-lg-6">
                            کدملی :
                            <br>
                            {{ $teacher->national_code }}
                        </div>
                        <div class="col-lg-6">
                            اموزش شما :
                            <br>
                            {{ $teacher->type_learn	 }}
                        </div>
                        <div class="col-lg-6">
                            همکاری با فراخط :
                            <br>
                            {{ $teacher->hiring_frakhat }}
                        </div>
                        <div class="col-lg-6">
                            عضو هیئت علمی :
                            <br>
                            {{ $teacher->University_faculty	 }}
                        </div>
                        <div class="col-lg-6">
                            مدرک تحصیلی :
                            <br>
                            {{ $teacher->status_education }}
                        </div>
                        <div class="col-lg-6">
                            ادرس :
                            <br>
                            {{ $teacher->address }}
                        </div>
                        <div class="col-lg-12">
                            فیش (اب ، برق،گاز،تلفن) :
                            <br>
                            <a href="{{ url('../../image/users/teacher/fish/'.$teacher->fish_water) }}">دانلود فیش</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="money" placeholder="سهم مدرس به درصد">
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary" onclick="save_teacher()" type="button">ذخیره سهم مدرس</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

