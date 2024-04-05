@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('discount_list') }}--}}
@endsection
@section('title')
    لیست لایسنس ها
@endsection

@section('script')
    @include('common.datatableAndAlertScript')
@endsection
@section('csspanel')
    @include('discount::components.css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست لایسنس ها
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
                                    <th>کاربر</th>
                                    <th>دوره</th>
                                    <th>شناسه دوره</th>
                                    <th>license</th>
                                    <th>تاریخ</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['orders'] as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->user->fullName ?? ''}}</td>
                                            <td>{{$item->course->title_course ?? ''}}</td>
                                            <td>{{$item->course->spotPlayerID ?? ''}}</td>
                                            <td>{{$item->license ?? ''}}</td>
                                            <td>{{$item->created_at->toJalali()->format('Y/m/d') ?? ''}}</td>
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

