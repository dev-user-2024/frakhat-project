<!DOCTYPE html>
@php
    $setting = \App\Models\setting_website::first();
@endphp
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>بازنشانی گذرواژه - Vuexy - قالب مدیریتی نوین پردازش آروکو</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('../../image/setting/favicon/'.$setting->favicon_website) }}">
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
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center p-0">
                                <img src="../../panelStyle/app-assets/images/pages/reset-password.png" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">بازنشانی گذرواژه</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">لطفاً رمز جدید خود را وارد کنید</p>


                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form method="POST" action="{{ route('password.update') }}">
                                                <input type="hidden" name="token" id="token" value="{{ $token }}">

                                                @csrf
                                                <fieldset class="form-label-group">
                                                    <input type="text" readonly value="{{ $email ?? old('email') }}"  name="email"  class="form-control @error('email') is-invalid @enderror" id="emails" placeholder="ایمیل" required>
                                                    <label for="user-email">ایمیل</label>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>

                                                <fieldset class="form-label-group">
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" id="passwords" placeholder="کلمه عبور" >
                                                    <label for="user-password">کلمه عبور</label>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>

                                                <fieldset class="form-label-group">
                                                    <input type="password" class="form-control" id="passwordconfirmation" name="password_confirmation"  autocomplete="new-password" placeholder="تکرار رمزعبور" >
                                                    <label for="user-confirm-password">تکرار رمزعبور</label>

                                                </fieldset>
                                                <div class="row pt-2">
                                                    <div class="col-12 col-md-6 mb-1">
                                                        <a href="/" class="btn btn-outline-primary btn-block px-0">بازگشت به قسمت ورود</a>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-1">
                                                        <button type="submit" class="btn btn-primary btn-block px-0">تنظیم مجدد</button>
                                                    </div>
                                                </div>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script><!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<!-- END: Page JS-->
<script>

</script>
</body>
<!-- END: Body-->
</html>
