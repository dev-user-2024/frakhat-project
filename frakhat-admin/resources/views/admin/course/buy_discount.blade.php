@extends('layouts.indexpanel')
@section('breadcrumb')
    {{ Breadcrumbs::render('discount_code_list') }}

@endsection
@section('title')
    لیست کدتخفیف
@endsection
@section('button')
    <a class="btn btn-primary" href="/admin/discount_code_create">افزودن کدتخفیف</a>
@endsection
@section('script')
    <script src="{{ url('../../panelstyle/app-assets/js/scripts/ui/data-list-view.min.js') }}"></script>
   <script src="{{ url('../../panelStyle/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
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
                    url:"/api/admin/marketing_pay/{{ $id }}",
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
                    {data:'money'},
                    {data:'ip'},
                    {data:'date_register'},


                ],

            });
        } );


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
                        لیست کدتخفیف
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
                                    <th>نام </th>
                                    <th>نام خانوادگی</th>
                                    <th>نام دوره</th>
                                    <th>سود شما از این خرید</th>
                                    <th>ای پی</th>
                                    <th>تاریخ و ساعت ثبت</th>
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

