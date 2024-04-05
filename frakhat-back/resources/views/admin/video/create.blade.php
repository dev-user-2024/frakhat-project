@extends('layouts.indexpanel')
@section('breadcrumb')
    {{ Breadcrumbs::render('video_create') }}

@endsection
@section('title')
    افزودن ویدیو
@endsection
@section('script')
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
            $('#VideoSave').on('submit', (function (e) {
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
                    success: function (response) {
                        Swal.fire({
                            title: 'موفقیت آمیز',
                            text: "باموفقیت ثبت شد",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'باشه'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href="/admin/video_list"

                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.title_video === undefined) {
                            document.getElementById('titlevideos').innerHTML = " "

                        } else {
                            document.getElementById('titlevideos').innerHTML = obj.errors.title_video

                        }
                        if (obj.errors.description === undefined) {
                            document.getElementById('descriptionss').innerHTML = " "

                        } else {
                            document.getElementById('descriptionss').innerHTML = obj.errors.description

                        }
                        if (obj.errors.link_video === undefined) {
                            document.getElementById('linkvideos').innerHTML = " "

                        } else {
                            document.getElementById('linkvideos').innerHTML = obj.errors.link_video

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
                        <h4 class="card-title">افزودن ویدیو </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="VideoSave" action="/api/admin/video_news" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder="عنوان ویدیو" name="title_video">
                                                <label for="first-name-floating">عنوان ویدیو</label>
                                            </div>
                                            <p id="titlevideos" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder="لینک ویدیو" name="link_video">
                                                <label for="first-name-floating">لینک ویدیو</label>
                                            </div>
                                            <p id="descriptionss" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="file" id="first-name-floating" class="form-control" placeholder="کاور ویدیو" name="cover_vedio">
                                                <label for="first-name-floating">کاور ویدیو</label>
                                            </div>
                                            <p id="descriptionss" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                                                <label for="first-name-floating">توضیحات ویدیو</label>
                                            </div>
                                            <p id="linkvideos" class="text-danger text-right"></p>
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
