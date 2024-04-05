@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('discount_list') }}--}}
@endsection
@section('title')
    لیست سفارشات
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
                        لیست سفارشات
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
                                    <th> شماره سفارش</th>
                                    <th>کاربر</th>
                                    <th>قیمت</th>
                                    <th>قیمت با تخفیف</th>
                                    <th>تعداد</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['orders'] as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->user->fullName ?? ''}}</td>
                                            <td>{{$item->total_price ?? ''}}</td>
                                            <td>{{$item->discounted_total_price ?? ''}}</td>
                                            <td>
                                                {{ $item->count ?? ''}}
                                            </td>

                                            <td>
                                                {{ $item->status ?? '' }}
                                            </td>
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

