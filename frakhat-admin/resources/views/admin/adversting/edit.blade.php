@extends('layouts.indexpanel')
@section('breadcrumb')
        {{ Breadcrumbs::render('adversting_edit',$adversting->id) }}

@endsection
@section('title')
    افزودن تبلیغات
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
                                location.href="/admin/adverting_list"

                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.image_url === undefined) {
                            document.getElementById('imageurl').innerHTML = " "

                        } else {
                            document.getElementById('imageurl').innerHTML = obj.errors.image_url

                        }
                        if (obj.errors.link_url === undefined) {
                            document.getElementById('linkurl').innerHTML = " "

                        } else {
                            document.getElementById('linkurl').innerHTML = obj.errors.link_url

                        }
                        if (obj.errors.posetion_adv === undefined) {
                            document.getElementById('posetionadv').innerHTML = " "

                        } else {
                            document.getElementById('posetionadv').innerHTML = obj.errors.posetion_adv

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
                        <h4 class="card-title">افزودن بنر تبلیغاتی </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="VideoSave" action="/api/admin/advertising/{{ $adversting->id }}" method="post">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" value="{{ $adversting->link_url }}" id="first-name-floating" class="form-control" placeholder="لینک تصویر" name="link_url">
                                                <label for="first-name-floating">لینک تصویر</label>
                                            </div>
                                            <p id="linkurl" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text"  value="{{ $adversting->image_url }}" id="first-name-floating" class="form-control" placeholder="ادرس تصویر" name="image_url">
                                                <label for="first-name-floating">ادرس تصویر</label>
                                            </div>
                                            <p id="imageurl" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <select name="posetion_adv" class="form-control" id="">
                                                    <option value="sidebar" @if($adversting->image_url == "sidebar") selected @endif>نوار کناری</option>
                                                    <option value="section1" @if($adversting->image_url == "section1") selected @endif>سکشن اول</option>
                                                    <option value="section2" @if($adversting->image_url == "section2") selected @endif>سکشن دوم</option>
                                                </select>
                                                <label for="first-name-floating">موقعیت بنر</label>
                                            </div>
                                            <p id="posetionadv" class="text-danger text-right"></p>
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
