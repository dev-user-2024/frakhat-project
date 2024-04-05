@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('adversting_list') }}--}}

@endsection
@section('title')
    لیست مشاغل
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('Job.create')}}">افزودن شغل جدید </a>
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
                        لیست مشاغل
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
                                    <th>نوع همکاری </th>
                                    <th>حداقل  حقوق</th>
                                    <th>شرح موقعیت شغلی</th>
                                    <th>حداقل سابقه کار</th>
                                    <th>جنسیت</th>
                                    <th>حداقل مدرک تحصیلی</th>
                                    <th>وضعیت سربازی</th>
                                    <th>
                                        ویرایش / حذف
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{$job->id}}</td>
                                        <td>{{$job->title}}</td>
                                        <td>
                                            {{$job->TypeOfCooperation}}
                                        </td>
                                        <td>
                                            {{$job->MinimumSalary}}
                                        </td>
                                        <td>
                                            {{$job->description}}
                                        </td>
                                        <td>
                                            {{$job->MinimumWorkExperience}}
                                        </td>
                                        <td>
                                            {{$job->gender}}
                                        </td>
                                        <td>
                                            {{$job->MinimumEducationDegree}}
                                        </td>
                                        <td>
                                            {{$job->militaryServiceSituation}}
                                        </td>
                                        <td>
                                            <a href="{{route('Job.edit', $id = $job->id )}}">
                                            <button style='background: transparent;border: none'><span class='action-edit'><i class='feather icon-edit'></i></span></button>
                                            </a>
                                            <form action="{{ route('Job.destroy', $id = $job->id) }}" method="POST">
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

