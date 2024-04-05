@extends('layouts.indexpanel')
@section('breadcrumb')
        {{ Breadcrumbs::render('users_create') }}

@endsection
@section('title')
    ایجاد کاربر جدید
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
                                if (response.role == 'user'){
                                    location.href = "/admin/user_list"

                                }else if(response.role == 'admin'){
                                    location.href = "/admin/admin_list"

                                }else{
                                    location.href = "/admin/reporter_list"

                                }
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.email === undefined) {
                            document.getElementById('emailUser').innerHTML = " "

                        } else {
                            document.getElementById('emailUser').innerHTML = obj.errors.email

                        }
                        if (obj.errors.fname === undefined) {
                            document.getElementById('fnameUser').innerHTML = " "

                        } else {
                            document.getElementById('fnameUser').innerHTML = obj.errors.fname

                        }
                        if (obj.errors.lname === undefined) {
                            document.getElementById('lnameUser').innerHTML = " "

                        } else {
                            document.getElementById('lnameUser').innerHTML = obj.errors.lname

                        }
                        if (obj.errors.role === undefined) {
                            document.getElementById('roleUser').innerHTML = " "

                        } else {
                            document.getElementById('roleUser').innerHTML = obj.errors.role

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
                        <h4 class="card-title">افزودن کاربر </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="categorySave" action="/api/admin/users/user_create" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder="نام" name="fname">
                                                <label for="first-name-floating">نام</label>
                                            </div>
                                            <p id="fnameUser" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder="نام خانوادگی" name="lname">
                                                <label for="first-name-floating">نام خانوادگی</label>
                                            </div>
                                            <p id="lnameUser" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder="ایمیل" name="email">
                                                <label for="first-name-floating">ایمیل</label>
                                            </div>
                                            <p id="emailUser" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <select name="role" class="form-control" id="">
                                                    <option value="">سطح دسترسی را انتخاب نمایید</option>
                                                    <option value="admin">مدیر</option>
                                                    <option value="user">کاربر</option>
                                                    <option value="reporter">خبرنگار</option>
                                                    <option value="marketer">بازاریاب</option>
                                                </select>
                                                <label for="first-name-floating">سطح دسترسی</label>
                                            </div>
                                            <p id="roleUser" class="text-danger text-right"></p>
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
