@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('discount_list') }}--}}
@endsection
@section('title')
    لیست کد های تخفیف
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('discount.create', ['type'=>$data['type']])}}">افزودن کد تخفیف  </a>
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
                        لیست کد های تخفیف
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
                                    @if($data['type'] == 'course_category')
                                        <th>دسته بندی</th>
                                    @endif
                                    @if($data['type'] == 'course')
                                        <th> دوره</th>
                                    @endif
                                    <th>درصد</th>
                                    <th>ماکزیمم استفاده بازاریاب</th>
                                    <th>ماکزیمم تعداد کاربر</th>
                                    <th>ماکزیمم مبلغ</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['discounts'] as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->code}}</td>
                                            @if($data['type'] == 'course_category')
                                                <td>
                                                    {{ $item->courseCategory->title ?? '' }}
                                                </td>
                                            @endif
                                            @if($data['type'] == 'course')
                                                <td>
                                                    {{ $item->course->title_course ?? '' }}
                                                </td>
                                            @endif

                                            <td>
                                                {{ $item->percent ?? '' }}
                                            </td>
                                            <td>
                                                {{ $item->maxOfMarketer ?? '' }}
                                            </td>
                                            <td>{{$item->maxOfUser ?? ''}}</td>
                                            <td>{{ number_format($item->maxOfPrice) ?? ''}}</td>
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

