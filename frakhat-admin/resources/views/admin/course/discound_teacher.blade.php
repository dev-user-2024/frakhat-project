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
                    url:"/api/admin/discount_admin_list",
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
                            var price = new Intl.NumberFormat().format(JsonResultRow.price_gift);

                            return price+" "+"تومان";
                        },
                    },
                    {data:'Fname'},
                    {data:'Lname'},
                    {data:'code'},

                    {
                        sortable: false,
                        "render": function ( data, type, full, meta ) {
                            return "<button onclick='delete_category("+full.id+")' style='background: transparent;border: none'><span class='action-edit'><i class='feather icon-trash'></i></span></button><button onclick='pay_discound("+full.id+")' style='background: transparent;border: none'><span class='action-edit'><i class='feather icon-gift'></i></span></button>";
                        }
                    }
                ],

            });
        } );
        function edit_discountcode(id){
            location.href='/admin/discount_code_edit/'+id
        }
        function pay_discound(id){
            location.href='/admin/marketing_discount/'+id

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
                        url:"/api/admin/discount_code/"+id,
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
                                    location.href = "/admin/discount_code_list"
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
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>مبلغ</th>
                                    <th>کدتخفیف</th>
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

