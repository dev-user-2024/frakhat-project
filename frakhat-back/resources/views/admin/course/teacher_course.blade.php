@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('category_course_list') }}--}}

@endsection
@section('title')
    لیست دوره های ثبت شده
@endsection

@section('script')
    <script src="{{ url('../../panelstyle/app-assets/js/scripts/ui/data-list-view.min.js') }}"></script>
    <script src="{{ url('../../panelstyle/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ url('../../panelstyle/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ url('../../panelstyle/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('../../panelstyle/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ url('../../panelstyle/app-assets/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ url('../../panelstyle/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $(document).ready(function() {
            var b=1;
            var token = localStorage.getItem('Token');

            $('#tblData').DataTable({
                "language": {
                    "paginate": {
                        "previous": "قبلی",
                        "next": "بعدی",
                    },
                    "sSearch": "جستجو : "
                },
                stateSave: false,
                "bDestroy": true,

                "order":[],

                "ajax":{
                    url:"/api/admin/teacher_courses",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader ("Authorization", "Bearer " + token);
                    },
                },

                "columns":[

                    {
                        "render": function (data, type, JsonResultRow, meta) {

                            return b++;
                        },
                    },
                    {data:'Fname'},
                    {data:'Lname'},
                    {data:'title_course'},
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                            var link = '<a href="../../image/users/teacher/course/'+JsonResultRow.season_course+'">دانلود فایل</a>'
                            return link;
                        },
                    },
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                            var link = '<a href="'+JsonResultRow.url_video_course+'">لینک</a>'
                            return link;
                        },
                    },
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                           if(JsonResultRow.status == 0){
                               var state = "<div class='badge badge-info'>درحال بررسی</div>"
                           }else if(JsonResultRow.status == 1){
                               var state = "<div class='badge badge-success'>تایید شده</div>"

                           }else{
                               var state = "<div class='badge badge-danger'>عدم تایید</div>"

                           }
                            return state;
                        },
                    },
                    {
                        sortable: false,
                        "render": function ( data, type, full, meta ) {
                            return "<button onclick='check_tacher("+full.id+")' style='background: transparent;border: none'><span class='action-edit'><i class='feather icon-file'></i></span></button>";
                        }
                    }
                ],

            });
        } );
        function check_tacher(id){
            var token = localStorage.getItem('Token');

            Swal.fire({
                title: '<strong>تایید و عدم تایید دوره</strong>',
                icon: 'info',
                html:
                    '<select class="form-control" id="state"><option value="">لطفا وضعیت دوره را مشخص نمایید</option><option value="1">تایید درگاه</option><option value="2">عدم تایید</option></select>',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: 'ذخیره وثبت',
                cancelButtonText: 'انصراف',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url : "/api/admin/teacher_courses_status/"+id,
                        type:"PATCH",
                        data:{
                            "_token":"{{ csrf_token() }}",
                            state : $('#state :selected').val(),
                        },
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader ("Authorization", "Bearer " + token);
                        },
                        success:function (response){
                            if (response.status === true){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'موفقیت امیز',
                                    text: 'با موفقیت ثبت شد',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }else{
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'هشدار',
                                    text: 'متاسفم شما یکبار ثبت را انجام داده اید',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }

                        },
                        error:function (){
                            Swal.fire({
                                icon: 'warning',
                                title: 'لطفا فیلد پیام را تکمیل نمایید',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    })
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        icon: 'info',
                        title: 'منصرف شدم',
                        showConfirmButton: false,
                        timer: 1500
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
                        لیست دوره های ثبت شده

                    </div>
                </div>
                <div class="card-body">
                    <section id="basic-datatable">


                        <!-- DataTable starts -->
                        <div class="table-responsive">
                            <table class="table zero-configuration dataTable " id="tblData">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>عنوان دوره</th>
                                    <th>سرفصل ها</th>
                                    <th>ویدیو اموزشی</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- DataTable ends -->

                        <!-- add new sidebar starts -->
                        <!-- add new sidebar ends -->

                    </section>

                </div>
            </div>
        </div>
    </div>

@endsection

