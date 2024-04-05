@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('discount_list') }}--}}
@endsection
@section('title')
    لیست کد های استفاده شده
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
                        لیست کد های استفاده شده
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
                                    <th>کد تخفیف</th>
                                    <th>کاربر</th>
                                    <th>ip</th>
                                    <th>دوره</th>
                                    <th>قیمت</th>
                                    <th>قیمت با تخفیف</th>
                                    <th>تعداد استفاده </th>
                                    <th>تاریخ</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['discounts'] as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->discount->code ?? ''}}</td>
                                            <td>{{$item->user->fullName ?? ''}}</td>
                                            <td>{{$item->user_ip ?? ''}}</td>
                                            <td>
                                                {{ $item->course->title_course ?? ''}}
                                            </td>

                                            <td>
                                                {{ $item->course_price ?? '' }}
                                            </td>
                                            <td>
                                                {{ $item->discounted_course_price ?? '' }}
                                            </td>
                                            <td>
                                                {{ $item->usage_count ?? '' }}
                                            </td>

                                            <td>{{$item->created_at->toJalali() ?? ''}}</td>
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

