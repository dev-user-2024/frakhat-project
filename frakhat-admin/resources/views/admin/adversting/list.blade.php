@extends('layouts.indexpanel')
@section('breadcrumb')
    {{ Breadcrumbs::render('adversting_list') }}

@endsection
@section('title')
    لیست تبلیغات
@endsection
@section('button')
    <a class="btn btn-primary" href="/admin/adverting_create">افزودن بنر تبلیغاتی</a>
@endsection
@section('script')
    <script src="{{ url('../../panelStyle/app-assets/js/scripts/ui/data-list-view.min.js') }}"></script>
   <script src="{{ url('../../panelStyle/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ url('../../panelStyle/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ url('../../panelStyle/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('../../panelStyle/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ url('../../panelStyle/app-assets/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ url('../../panelStyle/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
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
                    url:"/api/admin/advertising",
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
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                            return '<a href="'+JsonResultRow.image_url+'"><img src="'+JsonResultRow.image_url+'" style="width: 80px;height: 80px"></a>';
                        },
                    },
                    {data:'link_url'},
                    {
                        sortable: false,
                        "render": function ( data, type, full, meta ) {
                            return "<button onclick='edit_adversting("+full.id+")' style='background: transparent;border: none'><span class='action-edit'><i class='feather icon-edit'></i></span></button><button onclick='delete_category("+full.id+")' style='background: transparent;border: none'><span class='action-edit'><i class='feather icon-trash'></i></span></button>";
                        }
                    }
                ],

            });
        } );
        function edit_adversting(id){
            location.href="/admin/adverting_edit/"+id
        }
        function delete_category(id){
            var token = localStorage.getItem('Token');

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'آیا مطمئن هستید؟',
                text: "درصورت حذف اطلاعات باز نمیگردد",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله, حذف شود!',
                cancelButtonText: 'نه, منصرف شدم!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:"/api/admin/advertising/"+id,
                        type:"post",
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader ("Authorization", "Bearer " + token);
                        },
                        data:{
                            "_token" : "{{ csrf_token() }}",
                            "_method" : "DELETE",
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
                                    location.href = "/admin/adverting_list"
                                }
                            })
                        }
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'منصرف شدم',
                        'error'
                    )
                }
            })

        }

    </script>
@endsection
@section('csspanel')
    <link rel="stylesheet" type="text/css" href="{{ url('../../panelStyle/app-assets/css-rtl/pages/data-list-view.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panelStyle/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
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
                        لیست بنرهای تبلیغاتی
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
                                    <th>عنوان ویدیو</th>
                                    <th>لینک ویدیو</th>
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

