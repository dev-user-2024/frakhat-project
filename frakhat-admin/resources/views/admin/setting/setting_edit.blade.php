@extends('layouts.indexpanel')
@section('breadcrumb')
        {{ Breadcrumbs::render('setting_edit',$setting->id) }}

@endsection
@section('title')
    ویرایش تنظیمات
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
                                location.href = "/admin/setting_list"

                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.website_title === undefined) {
                            document.getElementById('websitetitleSetting').innerHTML = " "

                        } else {
                            document.getElementById('websitetitleSetting').innerHTML = obj.errors.website_title

                        }
                        if (obj.errors.website_copyright === undefined) {
                            document.getElementById('websitecopyrightSetting').innerHTML = " "

                        } else {
                            document.getElementById('websitecopyrightSetting').innerHTML = obj.errors.website_copyright

                        }
                        if (obj.errors.website_logo === undefined) {
                            document.getElementById('websitelogoSetting').innerHTML = " "

                        } else {
                            document.getElementById('websitelogoSetting').innerHTML = obj.errors.website_logo

                        }
                        if (obj.errors.website_favicon === undefined) {
                            document.getElementById('websitefaviconSetting').innerHTML = " "

                        } else {
                            document.getElementById('websitefaviconSetting').innerHTML = obj.errors.website_favicon

                        }
                        if (obj.errors.aboutme === undefined) {
                            document.getElementById('aboutmeSetting').innerHTML = " "

                        } else {
                            document.getElementById('aboutmeSetting').innerHTML = obj.errors.aboutme

                        }
                        if (obj.errors.meta_title === undefined) {
                            document.getElementById('metatitleSetting').innerHTML = " "

                        } else {
                            document.getElementById('metatitleSetting').innerHTML = obj.errors.meta_title

                        }
                        if (obj.errors.meta_description === undefined) {
                            document.getElementById('metadescriptionSetting').innerHTML = " "

                        } else {
                            document.getElementById('metadescriptionSetting').innerHTML = obj.errors.meta_description

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
                        <h4 class="card-title">ویرایش تنظیمات </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="categorySave" action="/api/admin/setting_website/{{ $setting->id }}" method="post">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" value="{{ $setting->title_website }}" class="form-control" placeholder="عنوان سایت" name="website_title">
                                                <label for="first-name-floating">عنوان سایت</label>
                                            </div>
                                            <p id="websitetitleSetting" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating"  value="{{ $setting->copyright_website }}" class="form-control" placeholder="قوانین کپی رایت" name="website_copyright">
                                                <label for="first-name-floating">قوانین کپی رایت</label>
                                            </div>
                                            <p id="websitecopyrightSetting" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="file" id="first-name-floating" class="form-control" placeholder="لوگو وبسایت" name="website_logo">
                                                <label for="first-name-floating">لوگو وبسایت</label>
                                            </div>
                                            <p id="websitelogoSetting" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="file" id="first-name-floating" class="form-control" placeholder="فایوایکن وبسایت" name="website_favicon">
                                                <label for="first-name-floating">فایوایکن وبسایت</label>
                                            </div>
                                            <p id="websitefaviconSetting" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" value="{{ $setting->meta_title }}" class="form-control" placeholder="عنوان متا" name="meta_title">
                                                <label for="first-name-floating">عنوان متا</label>
                                            </div>
                                            <p id="metatitleSetting" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" value="{{ $setting->meta_description }}" class="form-control" placeholder="توضیحات متا" name="meta_description">
                                                <label for="first-name-floating">توضیحات متا</label>
                                            </div>
                                            <p id="metadescriptionSetting" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" value="{{ $setting->percent_gift_marketer }}" class="form-control" placeholder="درصد پورسانت کدتخفیف بازاریاب" name="percent_gift_marketer">
                                                <label for="first-name-floating">درصد پورسانت کدتخفیف بازاریاب</label>
                                            </div>
                                            <p id="metadescriptionSetting" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <textarea name="aboutme" placeholder="درباره ی ما" class="form-control" id="" cols="30" rows="10">{{ $setting->about_me }}</textarea>
                                                <label for="first-name-floating">درباره ی ما</label>
                                            </div>
                                            <p id="aboutmeSetting" class="text-danger text-right"></p>
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
