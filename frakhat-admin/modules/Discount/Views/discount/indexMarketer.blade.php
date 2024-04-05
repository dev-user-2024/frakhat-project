@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('discount_list') }}--}}
@endsection
@section('title')
    لیست درصد تخفیف برای دسته ها
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('discount.marketer.create')}}">افزودن درصد تخفیف  </a>
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
                        لیست درصد تخفیف برای دسته ها
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
                                    <th>دسته بندی</th>
                                    <th>درصد</th>
                                    <th>ماکزیمم تعداد کاربر</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['discounts'] as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>
                                                {{ $item->courseCategory->title ?? '' }}
                                            </td>
                                            <td>{{$item->percent ?? ''}}</td>
                                            <td>{{$item->maxOfMarketer ?? ''}}</td>
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

