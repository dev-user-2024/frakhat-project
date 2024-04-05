<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{ meta_description() }}">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>صفحه ثبت نام -  {{ meta_title() }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ favicon_logo() }}">
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
    <link rel="stylesheet" type="text/css" href="../assets/css/style-rtl.css">
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
                <div class="col-xl-8 col-10 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                <img src="../../panelStyle/app-assets/images/pages/register.jpg" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 p-2">
                                    <div class="card-header pt-50 pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">ایجاد حساب کاربری کاربر</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">برای ایجاد یک حساب کاربری فرم زیر را پر کنید.</p>
                                    <div class="card-content">
                                        <div class="card-body pt-0">
                                            <form >
                                                @csrf
                                                <div class="form-label-group">
                                                    <input type="text" id="fname" class="form-control" placeholder="نام" >
                                                    <label for="inputName">نام</label>
                                                    <p id="NameUsers" class="text-danger text-right"></p>
                                                </div>
                                                <div class="form-label-group">
                                                    <input type="text" id="lname" class="form-control" placeholder="نام خانوادگی" >
                                                    <label for="inputEmail">نام خانوادگی</label>
                                                    <p id="FamilyUsers" class="text-danger text-right"></p>
                                                </div>
                                                <div class="form-label-group">
                                                    <input type="text" id="email" class="form-control" placeholder="ایمیل" >
                                                    <label for="inputPassword">ایمیل</label>
                                                    <p id="EmailUsers" class="text-danger text-right"></p>
                                                </div>
                                                <div class="form-label-group">
                                                    <input type="password" id="password" class="form-control" placeholder="رمزعبور" >
                                                    <label for="inputPassword">رمزعبور</label>
                                                    <p id="PasswordUsers" class="text-danger text-right"></p>
                                                </div>



                                                <a href="/" class="btn btn-outline-primary float-left btn-inline mb-50">ورود</a>
                                                <button type="button" id="btnSave" class="btn btn-primary float-right btn-inline mb-50">ثبت نام</button>
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
<script src="../../js/request.js"></script>
<script src="../../panelStyle/app-assets/js/scripts/components.min.js"></script>
<!-- END: Theme JS-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

</body>
<!-- END: Body-->
</html>
