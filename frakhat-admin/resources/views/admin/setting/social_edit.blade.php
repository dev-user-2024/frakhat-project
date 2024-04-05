@extends('layouts.indexpanel')
@section('breadcrumb')
        {{ Breadcrumbs::render('social_edit',$social->id) }}

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
                                location.href='/admin/social_list'
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.phoneNumber === undefined) {
                            document.getElementById('phoneNumberSocail').innerHTML = " "

                        } else {
                            document.getElementById('phoneNumberSocail').innerHTML = obj.errors.phoneNumber

                        }
                        if (obj.errors.address === undefined) {
                            document.getElementById('addressSocial').innerHTML = " "

                        } else {
                            document.getElementById('addressSocial').innerHTML = obj.errors.address

                        }

                    }
                });
            }));
        });


    </script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <script src = "<?php echo url('../../panelstyle/map/LeafletConfig.js')?>"></script>
    <script src = "<?php echo url('../../panelstyle/map/scripts.js')?>"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
@section('csspanel')
    <link rel = "stylesheet" href = "<?php echo url('../../panelstyle/map/leaflet.contextmenu.css')?>"/>
    <link rel = "stylesheet" href = "<?php echo url('../../panelstyle/map/leaflet-routing-machine.css')?>"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"

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
                            <form class="form" id="categorySave" action="/api/admin/social_media/{{ $social->id }}" method="post">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" value="{{ $social->instagram_id }}" class="form-control" placeholder="اینستاگرام" name="instagram_id">
                                                <label for="first-name-floating">اینستاگرام</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating"  value="{{ $social->telegram_id }}" class="form-control" placeholder="تلگرام" name="telegram_id">
                                                <label for="first-name-floating">تلگرام</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" value="{{ $social->twitter_id }}"  placeholder="توئیتر" name="twitter_id">
                                                <label for="first-name-floating">توئیتر</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" value="{{ $social->bale_id }}" placeholder="بله" name="bale_id">
                                                <label for="first-name-floating">بله</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" value="{{ $social->eitaa_id }}" class="form-control" placeholder="ایتا" name="eitaa_id">
                                                <label for="first-name-floating">ایتا</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" value="{{ $social->tell }}" class="form-control" placeholder="شماره ثابت" name="phoneNumber">
                                                <label for="first-name-floating">شماره ثابت</label>
                                            </div>
                                            <p id="phoneNumberSocail" class="text-danger text-right"></p>

                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" value="{{ $social->address }}" class="form-control" placeholder="آدرس" name="address">
                                                <label for="first-name-floating">آدرس</label>
                                            </div>
                                            <p id="addressSocial" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" value="{{ $social->longitude }}" class="form-control" readonly placeholder="طول جغرافیایی" name="longitude">
                                                <label for="first-name-floating">طول جغرافیایی</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" value="{{ $social->latitude }}" class="form-control" readonly placeholder="عرض جغرافیایی" name="latitude">
                                                <label for="first-name-floating">عرض جغرافیایی</label>
                                            </div>
                                        </div>

                                        <div id="map" class="map" style="position:relative;width:100%;height:400px;"  tabindex="0"></div>

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
