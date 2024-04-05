@extends('layouts.indexpanel')
@section('breadcrumb')
    {{ Breadcrumbs::render('reporter_admin') }}

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
            $('#UpdateAdminProfile').on('submit', (function (e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader ("Authorization", "Bearer " + token);
                    },
                    processData: false,
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
                                location.href = "/admin/reporter_profile"
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.fname === undefined) {
                            document.getElementById('NameReporter').innerHTML = " "

                        } else {
                            document.getElementById('NameReporter').innerHTML = obj.errors.fname

                        }
                        if (obj.errors.lname === undefined) {
                            document.getElementById('familyReporter').innerHTML = " "

                        } else {
                            document.getElementById('familyReporter').innerHTML = obj.errors.lname

                        }
                        if (obj.errors.picture === undefined) {
                            document.getElementById('picturereporter').innerHTML = " "

                        } else {
                            document.getElementById('picturereporter').innerHTML = obj.errors.picture

                        }
                        if (obj.errors.national_code === undefined) {
                            document.getElementById('nationalcodeReporter').innerHTML = " "

                        } else {
                            document.getElementById('nationalcodeReporter').innerHTML = obj.errors.national_code

                        }
                        if (obj.errors.address === undefined) {
                            document.getElementById('addressReporter').innerHTML = " "

                        } else {
                            document.getElementById('addressReporter').innerHTML = obj.errors.address

                        }
                        if (obj.errors.upload_codemili === undefined) {
                            document.getElementById('uploadcodemiliReporter').innerHTML = " "

                        } else {
                            document.getElementById('uploadcodemiliReporter').innerHTML = obj.errors.upload_codemili

                        }
                        if (obj.errors.phone_number === undefined) {
                            document.getElementById('phonenumberReporter').innerHTML = " "

                        } else {
                            document.getElementById('phonenumberReporter').innerHTML = obj.errors.phone_number

                        }





                    }
                });
            }));
        });

        $(document).ready(function (e) {
            $(document).ajaxStart(function () {
                document.getElementById("btnshow").style.display = "block";
                document.getElementById("btnRequest").style.display = "none";

            }).ajaxStop(function () {
                document.getElementById("btnshow").style.display = "none";
                document.getElementById("btnRequest").style.display = "block";
            });
            $('#ChangePassword').on('submit', (function (e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
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
                                location.href = "/admin/admin_profile"
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.current_password === undefined) {
                            document.getElementById('currentpasswordAdmin').innerHTML = " "

                        } else {
                            document.getElementById('currentpasswordAdmin').innerHTML = obj.errors.current_password

                        }
                        if (obj.errors.new_password === undefined) {
                            document.getElementById('newpasswordAdmin').innerHTML = " "

                        } else {
                            document.getElementById('newpasswordAdmin').innerHTML = obj.errors.new_password

                        }
                        if (obj.errors.new_confirm_password === undefined) {
                            document.getElementById('newconfirmpasswordAdmin').innerHTML = " "

                        } else {
                            document.getElementById('newconfirmpasswordAdmin').innerHTML = obj.errors.new_confirm_password

                        }





                    }
                });
            }));
        });
    </script>
@endsection
@section('content')
    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">حساب</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                <i class="feather icon-lock mr-25"></i><span class="d-none d-sm-block">تغییر رمزعبور</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                            <!-- users edit media object start -->
                            <div class="media mb-2">
                                <a class="mr-2 my-25" href="#">
                                    <img src="@if(!empty($reporter_profile->picture)) {{ url('../../image/users/reporters/profile/'.$reporter_profile->picture) }}  @else {{ url('../../panelStyle/app-assets/images/portrait/small/avatar-s-18.png') }}  @endif" alt="users avatar" class="users-avatar-shadow rounded" width="90" height="90">
                                </a>
                                <div class="media-body mt-50">
                                    <h4 class="media-heading">{{ $reporter_profile->Fname ."  ". $reporter_profile->Lname}}</h4>

                                </div>
                            </div>
                            <!-- users edit media object ends -->
                            <!-- users edit account form start -->
                            <form action="/api/reporter/update_reporter" id="UpdateAdminProfile" method="post">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>نام کاربری</label>
                                                <input type="text" class="form-control" readonly placeholder="نام کاربری" value="{{ auth::user()->email }}" required="" data-validation-required-message="This username field is required">
                                                <div class="help-block"></div></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>نام خانوادگی</label>
                                                <input type="text" class="form-control" placeholder="نام خانوادگی" value="{{ $reporter_profile->Lname }}" name="lname">
                                                <div class="help-block"></div>
                                                <p id="familyReporter" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>کدملی</label>
                                                <input type="text" class="form-control" placeholder="کدملی" value="{{ $reporter_profile->national_code }}" name="national_code">
                                                <div class="help-block"></div>
                                                <p id="nationalcodeReporter" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>اپلود کارت ملی</label>
                                                <input type="file" class="form-control"  name="upload_codemili">
                                                <div class="help-block"></div>
                                                <p id="uploadcodemiliReporter" class="text-danger text-right"></p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>نام</label>
                                                <input type="text" class="form-control" placeholder="نام" value="{{ $reporter_profile->Fname }}" name="fname">
                                                <div class="help-block"></div>
                                            </div>
                                            <p id="NameReporter" class="text-danger text-right"></p>

                                        </div>

                                        <div class="form-group" >
                                            <div class="controls">
                                                <label>اپلود تصویر خبرنگار</label>
                                                <input type="file" class="form-control" name="picture" >
                                                <div class="help-block"></div>
                                                <p id="picturereporter" class="text-danger text-right"></p>


                                            </div>
                                            <div class="form-group" style="margin-top: 22px!important;">
                                                <div class="controls">
                                                    <label>شماره همراه</label>
                                                    <input type="text" class="form-control" placeholder="شماره همراه" value="{{ $reporter_profile->phone_number }}" name="phone_number">
                                                    <div class="help-block"></div>
                                                </div>
                                                <p id="phonenumberReporter" class="text-danger text-right"></p>

                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>آدرس</label>
                                                    <input type="text" class="form-control" placeholder="آدرس" value="{{ $reporter_profile->address }}" name="address">
                                                    <div class="help-block"></div>
                                                </div>
                                                <p id="addressReporter" class="text-danger text-right"></p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit" id="btnRequest" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"> ذخیره تغییرات</button>
                                        <button id="btnshow" class="btn btn-primary" type="button" disabled style="display: none">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            منتظر بمانید...
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- users edit account form ends -->
                        </div>
                        <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                            <!-- users edit Info form start -->
                            <form action="/admin/change_password" id="ChangePassword" method="post">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="row mt-1">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>رمزعبور فعلی</label>
                                                <input type="password" name="current_password"  class="form-control" placeholder="رمزعبور فعلی" >
                                                <div class="help-block"></div>
                                                <p id="currentpasswordAdmin" class="text-danger text-right"></p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>رمزعبور جدید</label>
                                                <input type="password"  name="new_password" class="form-control"  placeholder="رمزعبور جدید" >
                                                <div class="help-block"></div>
                                                <p id="newpasswordAdmin" class="text-danger text-right"></p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>تکرار رمزعبور جدید</label>
                                                <input type="password" name="new_confirm_password" class="form-control"  placeholder="تکرار رمزعبور جدید" >
                                                <div class="help-block"></div>
                                                <p id="newconfirmpasswordAdmin" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light"> ذخیره تغییرات</button>
                                        <button type="reset" class="btn btn-outline-warning waves-effect waves-light">تنظیم مجدد</button>
                                    </div>
                                </div>
                            </form>
                            <!-- users edit Info form ends -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
