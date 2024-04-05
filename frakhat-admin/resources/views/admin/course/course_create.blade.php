@extends('layouts.indexpanel')
@section('breadcrumb')
{{--        {{ Breadcrumbs::render('course_create') }}--}}
@endsection
@section('title')
    افزودن  دوره
@endsection
@section('script')
    <script src="https://cdn.tiny.cloud/1/dzikk7ym099gk68o6a7sxkz550xrm83kgh5shr3nz1uzwqul/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">افزودن  دوره </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="categorySave" action="{{route('course.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="spotPlayerID" class="form-control" placeholder=" شناسه دوره (در اسپات پلیر)" name="spotPlayerID">
                                                <label for="spotPlayerID">  شناسه دوره در اسپات پلیر</label>
                                            </div>
                                            <p id="spotPlayerID" class="text-danger text-right"></p>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <select id="type"  class="form-control" name="type" >
                                                    <option disabled>
                                                        لطفا دسته بندی منو را انتخاب نمایید
                                                    </option>
                                                    <option value="برنامه نویسی و هوش مصنوعی">برنامه نویسی و هوش مصنوعی</option>
                                                    <option value="طراحی و دیزاین">طراحی و دیزاین</option>
                                                    <option value="مهارت‌های نرم">مهارت‌های نرم</option>
                                                    <option value="کارآفرینی">کارآفرینی</option>
                                                    <option value="زبان‌های خارجه">زبان‌های خارجه</option>
                                                    <option value="مهارتی">مهارتی</option>
                                                    <option value="عکاسی">عکاسی</option>
                                                    <option value="تعمیرات">تعمیرات</option>
                                                </select>
                                                <label for="type">  دسته بندی منو</label>
                                            </div>
                                            <p id="type" class="text-danger text-right"></p>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder="عنوان دوره" name="course_title">
                                                <label for="first-name-floating">عنوان  دوره</label>
                                            </div>
                                            <p id="coursetitles" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="file"  id="first-name-floating" class="form-control" placeholder="تصویر دوره" name="course_thumbnail">
                                                <label for="first-name-floating">تصویر دوره</label>
                                            </div>
                                            <p id="coursethumbnails" class="text-danger text-right"></p>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <select id="category_title"  class="form-control" name="category_id" >
                                                    <option disabled>
                                                        لطفا دسته بندی را انتخاب نمایید
                                                    </option>
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">
                                                        {{$category->title}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <label for="first-name-floating">زمان دوره</label>
                                            </div>
                                            <p id="coursetimes" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-label-group">
                                                <input type="file" id="first-name-floating" class="form-control"  name="image_author">
                                                <label for="first-name-floating">تصویر برگزار کننده دوره</label>
                                            </div>
                                            <p id="imageauthors" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-label-group">
                                                <input type="file" id="first-name-floating" class="form-control"  name="sesason_back">
                                                <label for="first-name-floating">بک گراند سرفصل ها</label>
                                            </div>
                                            <p id="imageauthors" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-label-group">
                                                <input type="file" id="first-name-floating" class="form-control" name="course_thumbnail2">
                                                <label for="first-name-floating">تصویر فرعی</label>
                                            </div>
                                            <p id="course_thumbnail2" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder="زمان دوره" name="course_time">
                                                <label for="first-name-floating">زمان دوره</label>
                                            </div>
                                            <p id="coursetimes" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder="قیمت دوره" name="course_price">
                                                <label for="first-name-floating">قیمت دوره</label>
                                            </div>
                                            <p id="courseprices" class="text-danger text-right"></p>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <textarea name="course_content" class="form-control" id="" cols="30" rows="10"></textarea>
                                                <label for="first-name-floating">توضیحات دوره</label>
                                            </div>

                                        </div>
                                            <div class="col-12">
                                                <div class="form-label-group">
                                                <textarea name="excerpt_course" class="form-control" id="" cols="30"
                                                          rows="10"></textarea>
                                                <label for="first-name-floating">توضیحات کوتاه</label>
                                                </div>
                                            <p id="excerpt_course" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <textarea name="description_author" class="form-control" id="" cols="30" rows="10"></textarea>
                                                <label for="first-name-floating">توضیحات بزگرار کننده</label>
                                            </div>
                                            <p id="descriptionauthors" class="text-danger text-right"></p>
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
