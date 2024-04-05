@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('discount_create') }}--}}
@endsection
@section('title')
    افزودن کد تخفیف
@endsection
@section('script')
    @include('discount::components.btnDiscountStore')
@endsection

@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">افزودن کد تخفیف  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('discount.store')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$data['type']}}" name="type">
                                <div class="form-body">
                                    <div class="row">
                                        @if($data['type'] == 'course_category')
                                            <div class="col-12">
                                            <div class="form-label-group">
                                                <h6>دسته بندی</h6>
                                                <select id="discount_marketer_id" class="form-control" name="discount_marketer_id">
                                                    <option disabled>لطفا  دسته بندی را انتخاب نمایید</option>
                                                    @foreach($data['discountMarketers'] as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->courseCategory->title ?? '' }}
                                                            -> ({{ $item->percent ?? '' }}درصد)
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="discount_marketer_id"> دسته بندی </label>
                                            </div>
                                            @include('category::components.validationError', ['data' => 'discount_marketer_id'])
                                        </div>
                                        @endif
                                        @if($data['type'] == 'course')
                                            <div class="col-12">
                                                <div class="form-label-group">
                                                    <h6> دوره</h6>
                                                    <select id="course_id" class="form-control" name="course_id">
                                                        <option disabled>لطفا   دوره را انتخاب نمایید</option>
                                                        @foreach($data['courses'] as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->title_course ?? '' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label for="discount_marketer_id">  دوره </label>
                                                </div>
                                                @include('category::components.validationError', ['data' => 'course_id'])
                                            </div>
                                                <div class="col-12">
                                                    <div class="form-label-group">
                                                        <input type="text" id="percent" class="form-control"  name="percent" value="{{ $data['discount']->percent ?? old('percent') }}">
                                                        <label for="percent"> درصد تخفیف  </label>
                                                    </div>
                                                    @include('discount::components.validationError', ['data' => 'percent'])
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-label-group">
                                                        <input type="text" id="maxOfMarketer" class="form-control"  name="maxOfMarketer" value="{{ $data['discount']->maxOfMarketer ?? old('maxOfMarketer') }}">
                                                        <label for="code">  ماکزیمم تعداد کاربر برای هر بازاریاب </label>
                                                    </div>
                                                    @include('discount::components.validationError', ['data' => 'maxOfMarketer'])
                                                </div>
                                        @endif



                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="code" class="form-control"  name="code" value="{{ $data['discount']->code ?? old('code') }}">
                                                <label for="code">کد تخفیف </label>
                                            </div>
                                            @include('discount::components.validationError', ['data' => 'code'])
                                        </div>

                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="maxOfPrice" class="form-control"  name="maxOfPrice" value="{{ $data['discount']->maxOfMarketer ?? old('maxOfMarketer') }}">
                                                <label for="maxOfPrice">  ماکزیمم قیمت (به تومان) </label>
                                            </div>
                                            @include('discount::components.validationError', ['data' => 'maxOfPrice'])
                                        </div>

                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="maxOfUser" class="form-control"  name="maxOfUser" value="{{ $data['discount']->maxOfMarketer ?? old('maxOfMarketer') }}">
                                                <label for="maxOfUser">  ماکزیمم تعداد دفعات استفاده برای هر کاربر</label>
                                            </div>
                                            @include('discount::components.validationError', ['data' => 'maxOfUser'])
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button id="" type="submit"  class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                ذخیره تغییرات
                                            </button>

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
