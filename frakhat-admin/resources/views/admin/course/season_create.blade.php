@extends('layouts.indexpanel')
@section('breadcrumb')
    {{ Breadcrumbs::render('season_course_create') }}

@endsection
@section('title')
    افزودن فصل دوره
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
    <script>
        $(document).ready(function (e) {
            var token = localStorage.getItem('Token');

            $(document).ajaxStart(function () {
                document.getElementById("btnshow").style.display = "block";
                document.getElementById("btnRequest").style.display = "none";

            }).ajaxStop(function () {
                document.getElementById("btnshow").style.display = "none";
                document.getElementById("btnRequest").style.display = "block";
            });
            $('#categorySave').on('submit', (function (e) {
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
                                location.href = "/admin/course_list"
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.title_season === undefined) {
                            document.getElementById('titleseasons').innerHTML = " "

                        } else {
                            document.getElementById('titleseasons').innerHTML = obj.errors.title_season

                        }
                        if (obj.errors.video_link === undefined) {
                            document.getElementById('videolinks').innerHTML = " "

                        } else {
                            document.getElementById('videolinks').innerHTML = obj.errors.video_link

                        }
                        if (obj.errors.course_id === undefined) {
                            document.getElementById('courseids').innerHTML = " "

                        } else {
                            document.getElementById('courseids').innerHTML = obj.errors.course_id

                        }
                        if (obj.errors.status_free === undefined) {
                            document.getElementById('statusfrees').innerHTML = " "

                        } else {
                            document.getElementById('statusfrees').innerHTML = obj.errors.status_free

                        }
                        if (obj.errors.Priority === undefined) {
                            document.getElementById('Priorityss').innerHTML = " "

                        } else {
                            document.getElementById('Priorityss').innerHTML = obj.errors.Priority

                        }

                    }
                });
            }));
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
                        <h4 class="card-title">افزودن فصل دوره </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="categorySave" action="/api/admin/course/season_course" method="post" >
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder="عنوان فصل دوره" name="title_season">
                                                <label for="first-name-floating">عنوان فصل دوره</label>
                                            </div>
                                            <p id="titleseasons" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder="لینک ویدیو" name="video_link">
                                                <label for="first-name-floating">لینک ویدیو</label>
                                            </div>
                                            <p id="videolinks" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <select name="course_id" class="form-control" id="">
                                                    @foreach($course as $courese)
                                                        <option value="{{ $courese->id }}">{{ $courese->title_course }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="first-name-floating">دوره</label>
                                            </div>
                                            <p id="courseids" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <select name="status_free" class="form-control" id="">
                                                    <option value="">وضعیت پیش نمایش</option>
                                                    <option value="1">دارد</option>
                                                    <option value="0">ندارد</option>
                                                </select>
                                                <label for="first-name-floating">دوره</label>
                                            </div>
                                            <p id="statusfrees" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder="اولویت" name="Priority">
                                                <label for="first-name-floating">اولویت</label>
                                            </div>
                                            <p id="Priorityss" class="text-danger text-right"></p>
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
