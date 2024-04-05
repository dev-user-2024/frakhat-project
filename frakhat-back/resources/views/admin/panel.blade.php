@extends('layouts.indexpanel')
@section('breadcrumb')
    {{ Breadcrumbs::render('home') }}

@endsection
@section('title')
    داشبورد
@endsection
@section('script')
    <script>
        $(document).ready(function (e) {
            var token = localStorage.getItem('Token');


            $('#courseSave').on('submit', (function (e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader ("Authorization", "Bearer " + token);
                    },
                    success: function (data) {
                        Swal.fire({
                            title: 'موفقیت آمیز',
                            text: "باموفقیت ثبت شد",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'باشه'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = "/admin/dashboard"
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.category_title === undefined) {
                            document.getElementById('categorytitle').innerHTML = " "

                        } else {
                            document.getElementById('categorytitle').innerHTML = obj.errors.category_title

                        }

                    }
                });
            }));
        });


    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
@section('content')
    <section id="dashboard-analytics">
        <div class="row">
            @if(Auth::user()->hasRole('manager'))
{{--                <div class="col-xl-2 col-md-4 col-sm-6">--}}
{{--                    <div class="card text-center">--}}
{{--                        <div class="card-content">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="avatar bg-rgba-info p-50 m-0 mb-1">--}}
{{--                                    <div class="avatar-content">--}}
{{--                                        <i class="fa fa-list text-info font-medium-5"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h2 class="text-bold-700">{{ $course }}</h2>--}}
{{--                                <p class="mb-0 line-ellipsis">دوره ها</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                {{--            <div class="col-xl-2 col-md-4 col-sm-6">--}}
                {{--                <div class="card text-center">--}}
                {{--                    <div class="card-content">--}}
                {{--                        <div class="card-body">--}}
                {{--                            <div class="avatar bg-rgba-warning p-50 m-0 mb-1">--}}
                {{--                                <div class="avatar-content">--}}
                {{--                                    <i class="fa fa-newspaper-o text-warning font-medium-5"></i>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <h2 class="text-bold-700">{{ $news }}</h2>--}}
                {{--                            <p class="mb-0 line-ellipsis">خبرها</p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--            <div class="col-xl-2 col-md-4 col-sm-6">--}}
                {{--                <div class="card text-center">--}}
                {{--                    <div class="card-content">--}}
                {{--                        <div class="card-body">--}}
                {{--                            <div class="avatar bg-rgba-danger p-50 m-0 mb-1">--}}
                {{--                                <div class="avatar-content">--}}
                {{--                                    <i class="fa fa-newspaper-o  text-danger font-medium-5"></i>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <h2 class="text-bold-700">{{ $newsEnable }}</h2>--}}
                {{--                            <p class="mb-0 line-ellipsis">خبرهای تایید شده</p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--            <div class="col-xl-2 col-md-4 col-sm-6">--}}
                {{--                <div class="card text-center">--}}
                {{--                    <div class="card-content">--}}
                {{--                        <div class="card-body">--}}
                {{--                            <div class="avatar bg-rgba-primary p-50 m-0 mb-1">--}}
                {{--                                <div class="avatar-content">--}}
                {{--                                    <i class="fa fa-newspaper-o text-primary font-medium-5"></i>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <h2 class="text-bold-700">{{ $newsDisable }}</h2>--}}
                {{--                            <p class="mb-0 line-ellipsis">خبرهای بررسی نشده</p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}

{{--                <div class="col-xl-2 col-md-4 col-sm-6">--}}
{{--                    <div class="card text-center">--}}
{{--                        <div class="card-content">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="avatar bg-rgba-danger p-50 m-0 mb-1">--}}
{{--                                    <div class="avatar-content">--}}
{{--                                        <i class="fa fa-users text-danger font-medium-5"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h2 class="text-bold-700">{{ $admin }}</h2>--}}
{{--                                <p class="mb-0 line-ellipsis">مدیران</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-2 col-md-4 col-sm-6">--}}
{{--                    <div class="card text-center">--}}
{{--                        <div class="card-content">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="avatar bg-rgba-danger p-50 m-0 mb-1">--}}
{{--                                    <div class="avatar-content">--}}
{{--                                        <i class="fa fa-users text-danger font-medium-5"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h2 class="text-bold-700">{{ $reporter }}</h2>--}}
{{--                                <p class="mb-0 line-ellipsis">خبرنگاران</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-2 col-md-4 col-sm-6">--}}
{{--                    <div class="card text-center">--}}
{{--                        <div class="card-content">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="avatar bg-rgba-danger p-50 m-0 mb-1">--}}
{{--                                    <div class="avatar-content">--}}
{{--                                        <i class="fa fa-users text-danger font-medium-5"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h2 class="text-bold-700">{{ $userCount }}</h2>--}}
{{--                                <p class="mb-0 line-ellipsis">کابران</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--        </div>--}}
{{--        <div class="col-xl-12 col-md-12 col-sm-12">--}}
{{--            <div class="card text-center">--}}
{{--                <div class="card-content">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4>--}}
{{--                            لیست بازاریابی از طریق لینک--}}
{{--                        </h4>--}}
{{--                        @if(count($markting)>=1)--}}
{{--                            <table class="table table-dark" border="1">--}}
{{--                                <tr>--}}
{{--                                    <td>#</td>--}}
{{--                                    <td>نام و نام خانوادگی</td>--}}
{{--                                    <td>نام دوره</td>--}}
{{--                                    <td>ای پی</td>--}}
{{--                                    <td>تاریخ و ساعت ثبت</td>--}}
{{--                                </tr>--}}
{{--                                @foreach($markting as $key=>$mprofile)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $key+1 }}</td>--}}
{{--                                        <td>{{ $mprofile->Fname }} {{ $mprofile->Lname }}</td>--}}
{{--                                        <td>{{ $mprofile->title_course	 }}</td>--}}
{{--                                        <td>{{ $mprofile->ip }}</td>--}}
{{--                                        <td>{{ $mprofile->date_register }}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}

{{--                            </table>--}}
{{--                        @else--}}
{{--                            <div class="alert alert-danger w-100">--}}
{{--                                متاسفم موردی یافت نشد--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        </div>--}}
        @elseif(Auth::user()->hasRole('reporter'))
            {{--            <div class="col-xl-2 col-md-4 col-sm-6">--}}
            {{--                <div class="card text-center">--}}
            {{--                    <div class="card-content">--}}
            {{--                        <div class="card-body">--}}
            {{--                            <div class="avatar bg-rgba-danger p-50 m-0 mb-1">--}}
            {{--                                <div class="avatar-content">--}}
            {{--                                    <i class="fa fa-users text-danger font-medium-5"></i>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                            <h2 class="text-bold-700">{{ $newsUser }}</h2>--}}
            {{--                            <p class="mb-0 line-ellipsis">خبرهای شما</p>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col-xl-2 col-md-4 col-sm-6">--}}
            {{--                <div class="card text-center">--}}
            {{--                    <div class="card-content">--}}
            {{--                        <div class="card-body">--}}
            {{--                            <div class="avatar bg-rgba-danger p-50 m-0 mb-1">--}}
            {{--                                <div class="avatar-content">--}}
            {{--                                    <i class="fa fa-users text-danger font-medium-5"></i>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                            <h2 class="text-bold-700">{{ $newsUserEnable }}</h2>--}}
            {{--                            <p class="mb-0 line-ellipsis">خبرهای تایید شده</p>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col-xl-2 col-md-4 col-sm-6">--}}
            {{--                <div class="card text-center">--}}
            {{--                    <div class="card-content">--}}
            {{--                        <div class="card-body">--}}
            {{--                            <div class="avatar bg-rgba-danger p-50 m-0 mb-1">--}}
            {{--                                <div class="avatar-content">--}}
            {{--                                    <i class="fa fa-users text-danger font-medium-5"></i>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                            <h2 class="text-bold-700">{{ $newsUserDisable }}</h2>--}}
            {{--                            <p class="mb-0 line-ellipsis">خبرهای بررسی نشده</p>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col-xl-2 col-md-4 col-sm-6">--}}
            {{--                <div class="card text-center">--}}
            {{--                    <div class="card-content">--}}
            {{--                        <div class="card-body">--}}
            {{--                            <div class="avatar bg-rgba-danger p-50 m-0 mb-1">--}}
            {{--                                <div class="avatar-content">--}}
            {{--                                    <i class="fa fa-users text-danger font-medium-5"></i>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                            <h2 class="text-bold-700">{{ $newsUserNoCheck }}</h2>--}}
            {{--                            <p class="mb-0 line-ellipsis">خبرهای رد شده</p>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col-xl-2 col-md-4 col-sm-6">--}}
            {{--                <div class="card text-center">--}}
            {{--                    <div class="card-content">--}}
            {{--                        <div class="card-body">--}}
            {{--                            <div class="avatar bg-rgba-danger p-50 m-0 mb-1">--}}
            {{--                                <div class="avatar-content">--}}
            {{--                                    <i class="fa fa-users text-danger font-medium-5"></i>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                            <h2 class="text-bold-700">{{ $gallery }}</h2>--}}
            {{--                            <p class="mb-0 line-ellipsis">گالری خبر</p>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        @endif
        @if(Auth::user()->hasRole('user'))
{{--            <div class="col-xl-6 col-md-4 col-sm-6">--}}
{{--                <div class="card text-center">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="avatar bg-rgba-danger p-50 m-0 mb-1">--}}
{{--                                <div class="avatar-content">--}}
{{--                                    <i class="fa fa-video-camera text-danger font-medium-5"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <h2 class="text-bold-700">{{ $course_users }}</h2>--}}
{{--                            <p class="mb-0 line-ellipsis">دوره های شما</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-6 col-md-4 col-sm-6">--}}
{{--                <div class="card text-center">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="avatar bg-rgba-danger p-50 m-0 mb-1">--}}
{{--                                <div class="avatar-content">--}}
{{--                                    <i class="fa fa-money text-danger font-medium-5"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <h2 class="text-bold-700">{{ $trachonesh }} @if($trachonesh >=1000) تومان @endif </h2>--}}
{{--                            <p class="mb-0 line-ellipsis">موجودی حساب شما</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        @endif
        @if(Auth::user()->hasRole('teacher'))
{{--            <div class="col-xl-12 col-md-12 col-sm-12">--}}
{{--                <div class="card text-center">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2>--}}
{{--                                فرم دوره های شما--}}
{{--                            </h2>--}}
{{--                            <form action="/api/admin/save_default_course" id="courseSave" method="post">--}}
{{--                                @csrf--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <label for="">نام دوره</label>--}}
{{--                                        <input type="text" class="form-control" name="title_course">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <label for="">سرفصل ها</label>--}}
{{--                                        <input type="file" class="form-control" name="season_course">--}}

{{--                                    </div>--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <label for="">لینک ویدیو اموزشی(لطفا ویدیو را ابتدا در جایی اپلود و لینک را قراردهید)</label>--}}
{{--                                        <input type="text" class="form-control" name="link_course">--}}

{{--                                    </div>--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <button class="btn btn-primary mt-2 w-100">ثبت و ذخیره</button>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </form>--}}
{{--                            <hr>--}}
{{--                            <h2>--}}
{{--                                لیست دوره های شما--}}
{{--                            </h2>--}}
{{--                            <table class="table table-dark" border="1">--}}
{{--                                <tr>--}}
{{--                                    <td>#</td>--}}
{{--                                    <td>نام دوره</td>--}}
{{--                                    <td>لینک دانلود سرفصل</td>--}}
{{--                                    <td>لینک ویدیو</td>--}}
{{--                                    <td>وضعیت</td>--}}
{{--                                </tr>--}}
{{--                                @foreach($teacher_course as $key=>$tcourse)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $key+1 }}</td>--}}
{{--                                        <td>{{ $tcourse->title_course }}</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="../../image/users/teacher/course/{{ $tcourse->season_course }}">دانلود فایل</a>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{ $tcourse->url_video_course }}">دانلود ویدیو</a>--}}

{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($tcourse->status == 0)--}}
{{--                                                <div class="badge badge-warning">بررسی نشده</div>--}}
{{--                                            @elseif($tcourse->status == 1)--}}
{{--                                                <div class="badge badge-success">تایید شده</div>--}}

{{--                                            @else--}}
{{--                                                <div class="badge badge-danger">عدم تایید</div>--}}

{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


        @endif
        @if(Auth::user()->hasRole('marketer'))
{{--            <div class="col-xl-12 col-md-12 col-sm-12">--}}
{{--                <div class="card text-center">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="avatar bg-rgba-danger p-50 m-0 mb-1">--}}
{{--                                <div class="avatar-content">--}}
{{--                                    <i class="fa fa-money text-danger font-medium-5"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <h2 class="text-bold-700">{{ number_format($money_marketing) . "تومان" }} </h2>--}}
{{--                            <p class="mb-0 line-ellipsis">موجودی حساب شما</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


        @endif
    </section>
@endsection
