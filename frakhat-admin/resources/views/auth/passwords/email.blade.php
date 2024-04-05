<!DOCTYPE html>
<!--
Template Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Fee: https://www.rtl-theme.com/vuexy-Admin-Dashboard-Template
Renew Support: https://www.rtl-theme.com/vuexy-Admin-Dashboard-Template
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>صفحه قفل - Vuexy - قالب مدیریتی نوین پردازش آروکو</title>
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
                <div class="col-xl-7 col-10 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0 w-100">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="../../panelStyle/app-assets/images/pages/lock-screen.png" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2 pb-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">فراموشی رمزعبور</h4>
                                        </div>
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form method="POST" action="">

                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input type="text" class="form-control  " id="username" placeholder="ایمیل خود را وارد نمایید" >
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <label for="user-name">ایمیل خود را وارد نمایید</label>
                                                    <p id="email_users" class="text-danger text-right"></p>
                                                </fieldset>

                                                <button type="button" onclick="send_reset()" class="btn btn-primary float-right">ارسال ایمیل</button>
                                            </form>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- END: Theme JS-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- END: Theme JS-->
<script>
 function send_reset(){
     $.ajax({
         url:"{{ route('password.email') }}",
         type:"POST",
         data:{
             email:$('#username').val(),
             "_token":"{{ csrf_token() }}"
         },
         success:function (response){
                if (response.state == false){
                    Swal.fire({
                       title:"خطا",
                       icon:"error",
                       text:"متاسفم ایمیل شما یافت نشد",
                        confirmButtonText: 'تایید',

                    });
                }else{
                    Swal.fire({
                        title:"موفقیت",
                        icon:"success",
                        text:"با موفقیت ایمیل ارسال شد ایمیلتان را چک کنید",
                        confirmButtonText: 'تایید',

                    });
                }
         },
         error:function (error){
             var text = error.responseText;
             var obj = JSON.parse(text);
             if (obj.errors.email === undefined) {
                 document.getElementById('email_users').innerHTML = " "

             } else {
                 document.getElementById('email_users').innerHTML = obj.errors.email

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
