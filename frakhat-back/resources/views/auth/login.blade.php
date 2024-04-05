<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
{{--    <meta name="description" content="{{ meta_description() }}">--}}
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>صفحه ورود -  </title>
    <link rel="apple-touch-icon" href="../../stylepanel/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('../../panelStyle/app-assets/images/logo/logo.png') }}">

{{--    <link rel="shortcut icon" type="image/x-icon" href="{{ favicon_logo() }}">--}}
    <link href="../../panelStyle/app-assets/images/fonts.googleapis.css" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../panelStyle/app-assets/vendors/css/vendors-rtl.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../panelStyle/app-assets/css-rtl/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../panelStyle/app-assets/css-rtl/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../../panelStyle/app-assets/css-rtl/colors.min.css">
    <link rel="stylesheet" type="text/css" href="../../panelStyle/app-assets/css-rtl/components.min.css">
    <link rel="stylesheet" type="text/css" href="../../panelStyle/app-assets/css-rtl/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../panelStyle/app-assets/css-rtl/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../panelStyle/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="../../panelStyle/app-assets/css-rtl/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="../../panelStyle/app-assets/css-rtl/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../panelStyle/app-assets/css-rtl/custom-rtl.min.css">
    <link rel="stylesheet" type="text/css" href="../../panelStyle/assets/css/style-rtl.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>

        <div class="content-body"><section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="{{asset('panelStyle/app-assets/images/pages/login.png')}}" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">ورود</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">خوش آمدید ، لطفا به حساب کاربری خود وارد شوید</p>

                                    @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif

                                    <p id="MessageError" class="text-danger text-center"></p>
                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form method="post">
                                                @csrf

                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="نام کاربری" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <label for="user-name">نام کاربری</label>
                                                    <p id="emailUser" class="text-danger text-right"></p>
                                                </fieldset>

                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="کلمه عبور" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                    <label for="user-password">کلمه عبور</label>
                                                    <p id="passwordUser" class="text-danger text-right"></p>
                                                </fieldset>
                                                <div class="form-group d-flex justify-content-between align-items-center">
                                                    <div class="text-left">
                                                        <fieldset class="checkbox">

                                                        </fieldset>
                                                    </div>
{{--                                                    <div class="text-right"><a href="/password/reset" class="card-link">رمز ورود را فراموش کرده اید؟</a></div>--}}
                                                </div>
{{--                                                <a href="/register" class="btn btn-outline-primary float-left btn-inline">ثبت نام</a>--}}
                                                <button type="button" onclick="login()" class="btn btn-primary float-right btn-inline">ورود</button>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="login-footer mb-5">

                                        <div class="footer-btn d-inline">
{{--                                            <a href="/register_users" class="btn btn-outline-primary float-left btn-inline w-100">ثبت نام کاربر</a>--}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="../../panelStyle/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../../panelStyle/app-assets/js/core/app-menu.min.js"></script>
<script src="../../panelStyle/app-assets/js/core/app.min.js"></script>
<script src="../../panelStyle/app-assets/js/scripts/components.min.js"></script>
<!-- END: Theme JS-->
<script>
  function login(){
      $.ajax({
          url:"{{ route('login') }}",
          type:"POST",
          data:{
              email:$('#email').val(),
              password:$('#password').val(),
              "_token":"{{ csrf_token() }}"
          },
          success:function (response){
              if (response.status == 402){
                  document.getElementById('MessageError').innerHTML=response.message;
              }else{
                  localStorage.setItem('Token',response.access_token)
                  location.href='/admin/dashboard'
              }
          },
          error:function (error){
              var text = error.responseText;
              var obj = JSON.parse(text);
              if (obj.errors.email === undefined) {
                  document.getElementById('emailUser').innerHTML = " "

              } else {
                  document.getElementById('emailUser').innerHTML = obj.errors.email

              }
              if (obj.errors.password === undefined) {
                  document.getElementById('passwordUser').innerHTML = " "

              } else {
                  document.getElementById('passwordUser').innerHTML = obj.errors.password

              }
          }
      })

  }
</script>
<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

</body>
<!-- END: Body-->
</html>
