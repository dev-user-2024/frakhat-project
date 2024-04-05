@extends('layouts.indexpanel')
@section('breadcrumb')
        {{ Breadcrumbs::render('setting_list') }}

@endsection
@section('title')
    تنظیمات  سایت
@endsection

@section('script')
 <script src="{{ url('../../panelstyle/app-assets/js/scripts/ui/data-list-view.min.js') }}"></script>
    <script src="{{ url('../../panelStyle/app-assets/vendors/js/tables/datatable/datatable/datatables.min.js') }}"></script>
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
                    url:"/api/admin/setting_website_list",
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
                    {data:'title_website'},
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                            return '<a href="../../../image/setting/Logo/'+JsonResultRow.logo_website+'"><img src="../../../image/setting/Logo/'+JsonResultRow.logo_website+'" style="width: 80px;height: 80px"></a>';
                        },
                    },
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                            return '<a href="../../../image/setting/favicon/'+JsonResultRow.favicon_website+'"><img src="../../../image/setting/favicon/'+JsonResultRow.favicon_website+'" style="width: 80px;height: 80px"></a>';
                        },
                    },
                    {data:'meta_title'},
                    {
                        sortable: false,
                        "render": function ( data, type, full, meta ) {
                            return "<button onclick='edit_setting("+full.id+")' style='background: transparent;border: none'><span class='action-edit'><i class='feather icon-edit'></i></span></button>";
                        }
                    }
                ],

            });
        } );
        function edit_setting(id){
            location.href='/admin/setting_edit/'+id
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
                        تماس باما
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
                                    <th>عنوان تنظیمات</th>
                                    <th>لوگو وبسایت</th>
                                    <th>فایوایکن</th>
                                    <th>عنوان سئو</th>
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

