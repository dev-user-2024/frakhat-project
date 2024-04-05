@extends('layouts.indexpanel')
@section('breadcrumb')
{{--        {{ Breadcrumbs::render('adversting_edit',$adversting->id) }}--}}

@endsection
@section('title')
    ویرایش شرکت
@endsection
@section('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش شرکت </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="VideoSave" action="{{route('Company.update', $id)}}" method="post">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-body">
                                    <div class="row">
                                        <input type="hidden" name="user_id" value="{{ auth()->id()}}">
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" value="{{$companies->name_fa}}" name="name_fa">
                                                <label for="first-name-floating">نام(فارسی)</label>
                                            </div>
                                            <p id="name_fa" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" value="{{$companies->name_en}}" name="name_en">
                                                <label for="first-name-floating">نام(انگلیسی)</label>
                                            </div>
                                            <p id="name_en" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" value="{{$companies->establishedYear}}" name="establishedYear">
                                                <label for="first-name-floating">سال تاسیس</label>
                                            </div>
                                            <p id="establishedYear" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" value="{{$companies->numberOfPersons}}" name="numberOfPersons">
                                                <label for="first-name-floating">تعداد کارکنان</label>
                                            </div>
                                            <p id="numberOfPersons" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" value="{{$companies->address}}" name="address">
                                                <label for="first-name-floating">آدرس</label>
                                            </div>
                                            <p id="address" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" value="{{$companies->website}}" name="website">
                                                <label for="first-name-floating">وبسایت</label>
                                            </div>
                                            <p id="website" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" value="{{$companies->description}}" name="description">
                                                <label for="first-name-floating">توضیحات</label>
                                            </div>
                                            <p id="description" class="text-danger text-right"></p>
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
