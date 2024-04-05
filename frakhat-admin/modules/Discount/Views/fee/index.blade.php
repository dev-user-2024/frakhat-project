@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('discount_list') }}--}}
@endsection
@section('title')
    لیست تراکنش ها
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
                        لیست تراکنش ها
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
                                    <th>تعداد</th>
                                    <th>وضعیت</th>
                                    <th> شناسه پرداخت</th>
                                    <th>تاریخ</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['fees'] as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->order_id ?? ''}}</td>
                                            <td>{{$item->user->fullName ?? ''}}</td>
                                            <td>{{$item->price ?? ''}}</td>
                                            <td>
                                                {{ $item->count ?? ''}}
                                            </td>

                                            <td>
                                                {{ $item->status ?? '' }}
                                            </td>
                                            <td>
                                                {{ $item->transaction_id ?? '' }}
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

