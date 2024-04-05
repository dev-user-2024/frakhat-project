@extends('layouts.indexpanel')
@section('breadcrumb')
{{--        {{ Breadcrumbs::render('category_course_create') }}--}}

@endsection
@section('title')
    افزودن دسته بندی دوره
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
                        <h4 class="card-title">افزودن دسته بندی دوره</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('course_category.store')}}" method="post" >
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder="عنوان دسته بندی دوره" name="title">
                                                <label for="first-name-floating">عنوان دسته بندی دوره</label>
                                            </div>
                                            @include('tag::components.validationError', ['data' => 'title'])
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit" id="btnRequest" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"> ذخیره تغییرات</button>
                                            <button id="btnshow" class="btn btn-primary" type="submit" disabled style="display: none">
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
