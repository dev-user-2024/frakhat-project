@extends('layouts.indexpanel')
@section('breadcrumb')

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
                                location.href = "/admin/teacher_profile"
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.fname === undefined) {
                            document.getElementById('NameAdmin').innerHTML = " "

                        } else {
                            document.getElementById('NameAdmin').innerHTML = obj.errors.fname

                        }
                        if (obj.errors.lname === undefined) {
                            document.getElementById('familyAdmin').innerHTML = " "

                        } else {
                            document.getElementById('familyAdmin').innerHTML = obj.errors.lname

                        }
                        if (obj.errors.avatar === undefined) {
                            document.getElementById('pictureAdmin').innerHTML = " "

                        } else {
                            document.getElementById('pictureAdmin').innerHTML = obj.errors.avatar

                        }
                        if (obj.errors.card_number === undefined) {
                            document.getElementById('cardnumberss').innerHTML = " "

                        } else {
                            document.getElementById('cardnumberss').innerHTML = obj.errors.card_number

                        }
                        if (obj.errors.phone_number === undefined) {
                            document.getElementById('phonenumberss').innerHTML = " "

                        } else {
                            document.getElementById('phonenumberss').innerHTML = obj.errors.phone_number

                        }
                        if (obj.errors.shaba_number === undefined) {
                            document.getElementById('shabanumberss').innerHTML = " "

                        } else {
                            document.getElementById('shabanumberss').innerHTML = obj.errors.shaba_number

                        }
                        if (obj.errors.national_code === undefined) {
                            document.getElementById('nationalcodess').innerHTML = " "

                        } else {
                            document.getElementById('nationalcodess').innerHTML = obj.errors.national_code

                        }
                        if (obj.errors.type_learn === undefined) {
                            document.getElementById('typelearnss').innerHTML = " "

                        } else {
                            document.getElementById('typelearnss').innerHTML = obj.errors.type_learn

                        }
                        if (obj.errors.hiring_frakhat === undefined) {
                            document.getElementById('hiringfrakhatss').innerHTML = " "

                        } else {
                            document.getElementById('hiringfrakhatss').innerHTML = obj.errors.hiring_frakhat

                        }
                        if (obj.errors.University_faculty === undefined) {
                            document.getElementById('Universityfacultyss').innerHTML = " "

                        } else {
                            document.getElementById('Universityfacultyss').innerHTML = obj.errors.University_faculty

                        }
                        if (obj.errors.status_education === undefined) {
                            document.getElementById('statuseducationsss').innerHTML = " "

                        } else {
                            document.getElementById('statuseducationsss').innerHTML = obj.errors.status_education

                        }
                        if (obj.errors.address === undefined) {
                            document.getElementById('addressss').innerHTML = " "

                        } else {
                            document.getElementById('addressss').innerHTML = obj.errors.address

                        }
                        if (obj.errors.fish_water === undefined) {
                            document.getElementById('fishwaterss').innerHTML = " "

                        } else {
                            document.getElementById('fishwaterss').innerHTML = obj.errors.fish_water

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
                                location.href = "/admin/user_profile"
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
                                    <img src="@if(!empty($teacher->avatar)) {{ url('../../image/users/teacher/'.$teacher->avatar) }}  @else {{ url('../../panelStyle/app-assets/images/portrait/small/avatar-s-18.png') }}  @endif" alt="users avatar" class="users-avatar-shadow rounded" width="90" height="90">
                                </a>
                                <div class="media-body mt-50">
                                    <h4 class="media-heading">{{ $teacher->Fname }} {{ $teacher->Lname }}</h4>

                                </div>
                            </div>
                            <!-- users edit media object ends -->
                            <!-- users edit account form start -->
                            <form action="/api/admin/update_teacher" id="UpdateAdminProfile" method="post">
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
                                                <input type="text" class="form-control" placeholder="نام خانوادگی" value="{{ $teacher->Lname }}" name="lname">
                                                <div class="help-block"></div>
                                                <p id="familyAdmin" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>شماره شبا</label>
                                                <input type="text" class="form-control" placeholder="شماره شبا" value="{{ $teacher->shaba_number }}" name="shaba_number">
                                                <div class="help-block"></div>
                                                <p id="shabanumberss" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>کدملی</label>
                                                <input type="text" class="form-control" placeholder="کدملی" value="{{ $teacher->national_code }}" name="national_code">
                                                <div class="help-block"></div>
                                                <p id="nationalcodess" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>هیئت علمی دانشگاه</label>
                                                <select name="University_faculty" class="form-control" id="">
                                                    <option value="نیستم">نیستم</option>
                                                    <option value="علمی">علمی</option>
                                                    <option value="آزاد و پیام نور">آزاد و پیام نور</option>
                                                </select>
                                                <div class="help-block"></div>
                                                <p id="Universityfacultyss" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>آدرس منزل</label>
                                                <input type="text" class="form-control" placeholder="آدرس منزل" value="{{ $teacher->address }}" name="address">
                                                <div class="help-block"></div>
                                                <p id="addressss" class="text-danger text-right"></p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>نام</label>
                                                <input type="text" class="form-control" placeholder="نام" value="{{ $teacher->Fname }}" name="fname">
                                                <div class="help-block"></div>
                                            </div>
                                            <p id="NameAdmin" class="text-danger text-right"></p>

                                        </div>

                                        <div class="form-group">
                                            <div class="controls">
                                                <label>اپلود تصویر کاربر</label>
                                                <input type="file" class="form-control" name="avatar" >
                                                <div class="help-block"></div>
                                                <p id="pictureAdmin" class="text-danger text-right"></p>


                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>شماره کارت</label>
                                                <input type="text" class="form-control" placeholder="شماره کارت" value="{{ $teacher->card_number }}" name="card_number">
                                                <div class="help-block"></div>
                                            </div>
                                            <p id="cardnumberss" class="text-danger text-right"></p>

                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>نوع اموزش</label>
                                                <input type="text" class="form-control" placeholder="نوع اموزش" value="{{ $teacher->type_learn }}" name="type_learn">
                                                <div class="help-block"></div>
                                            </div>
                                            <p id="typelearnss" class="text-danger text-right"></p>

                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>ایا قبلا با فراخط همکاری داشتید؟</label>
                                                <input type="text" class="form-control" placeholder="ایا قبلا با فراخط همکاری داشتید" value="{{ $teacher->hiring_frakhat }}" name="hiring_frakhat">
                                                <div class="help-block"></div>
                                            </div>
                                            <p id="hiringfrakhatss" class="text-danger text-right"></p>

                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>مدرک تحصیلی</label>
                                                <select name="status_education" class="form-control" id="">
                                                    <option value="دانشجوری کارشناسی">دانشجوری کارشناسی</option>
                                                    <option value="فارغ التحصیل کاردانی">فارغ التحصیل کاردانی</option>
                                                    <option value="فارغ التحصیل کارشناسی">فارغ التحصیل کارشناسی</option>
                                                    <option value="دانشجوی ارشد">دانشجوی ارشد</option>
                                                    <option value="فارغ التحصیل ارشد">فارغ التحصیل ارشد</option>
                                                    <option value="دانشجوی دکتر">دانشجوی دکتر</option>
                                                    <option value="فارغ التحصیل دکترا">فارغ التحصیل دکترا</option>
                                                </select>
                                                <div class="help-block"></div>
                                                <p id="statuseducationsss" class="text-danger text-right"></p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>قبض(آب ، برق ، گاز،تلفن)</label>
                                                <input type="file" class="form-control" placeholder="قبض(آب ، برق ، گاز،تلفن)" value="{{ $teacher->fish_water }}" name="fish_water">
                                                <div class="help-block"></div>
                                                <p id="fishwaterss" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>شماره همراه</label>
                                                <input type="text" class="form-control" placeholder="شماره همراه" value="{{ $teacher->phone_number }}" name="phone_number">
                                                <div class="help-block"></div>
                                                <p id="phonenumberss" class="text-danger text-right"></p>
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
