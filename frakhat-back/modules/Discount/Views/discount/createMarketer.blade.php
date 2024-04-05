@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('discount_create') }}--}}
@endsection
@section('title')
    ثبت درصد تخفیف برای دسته ها
@endsection
@section('script')
    @include('discount::components.btnMarketerStore')
@endsection

@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">ثبت درصد تخفیف برای دسته ها  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('discount.marketer.store')}}" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <h2>دسته بندی</h2>
                                                <select id="course_category_id" class="form-control" name="course_category_id">
                                                    <option disabled>لطفا  دسته بندی را انتخاب نمایید</option>
                                                    @foreach($data['categories'] as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->title ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="course_category_id"> دسته بندی </label>
                                            </div>
                                            @include('category::components.validationError', ['data' => 'course_category_id'])
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
