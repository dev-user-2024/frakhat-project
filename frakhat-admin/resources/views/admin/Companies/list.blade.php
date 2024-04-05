@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('adversting_list') }}--}}

@endsection
@section('title')
    لیست شرکت ها
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('Company.create')}}">افزودن شرکت</a>
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
                        لیست شرکت ها
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
                                    <th>نام شرکت</th>
                                    <th>سال تاسیس</th>
                                    <th>تعداد کارکنان</th>
                                    <th>آدرس</th>
                                    <th>وبسایت</th>
                                    <th>توضیحات</th>
                                    <th>
                                        ویرایش / حذف
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td>{{$company->id}}</td>
                                        <td>{{$company->name_fa}} . {{$company->name_en}}</td>
                                        <td>
                                            {{$company->establishedYear}}
                                        </td>
                                        <td>
                                            {{$company->numberOfPersons}}
                                        </td>
                                        <td>
                                            {{$company->address}}
                                        </td>
                                        <td>
                                            {{$company->website}}
                                        </td>
                                        <td>
                                            {{$company->description}}
                                        </td>
                                        <td>
                                            <a href="{{route('Company.edit', $id = $company->id )}}">
                                            <button style='background: transparent;border: none'><span class='action-edit'><i class='feather icon-edit'></i></span></button>
                                            </a>
                                            <form action="{{ route('Company.destroy', $id = $company->id) }}" method="POST">
                                                @CSRF
                                                @method('DELETE')
                                            <button style='background: transparent;border: none'><span class='action-edit'><i class='feather icon-trash'></i></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- DataTable ends -->
                    </section>
                </div>
            </div>
        </div>
    </div>

@endsection

