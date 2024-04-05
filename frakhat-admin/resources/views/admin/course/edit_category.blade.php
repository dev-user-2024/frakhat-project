@extends('layouts.indexpanel')
@section('breadcrumb')
{{--        {{ Breadcrumbs::render('category_course_edit',$cateogry_course->id) }}--}}

@endsection
@section('title')
    ویرایش دسته بندی دوره
@endsection
@section('script')
    @include('language::components.btnSubmitScript')
@endsection
@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش دسته بندی دوره </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('course_category.update', $id = $category_course->id)}}" method="post" >
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <div class="form-label-group">
                                                <input type="text" value="{{ $category_course->title }}" class="form-control" placeholder="عنوان دسته بندی دوره" name="title">
                                                <label for="first-name-floating">عنوان دسته بندی دوره</label>
                                            </div>
                                            @include('tag::components.validationError', ['data' => 'title'])
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit" id="btnRequest" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"> ذخیره تغییرات</button>
                                            <button id="btnshow" class="btn btn-primary" type="button" disabled style="display: none">
                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                منتظر بمانید...
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
