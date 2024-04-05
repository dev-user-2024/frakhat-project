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
    <title>@yield('title') -  فراخط پنل </title>
    <link rel="apple-touch-icon" href="{{ asset('panelStyle/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('../../panelStyle/app-assets/images/logo/logo.png') }}">
    <link href="{{ asset('panelStyle/app-assets/images/fonts.googleapis.css') }}" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/vendors/css/extensions/shepherd-theme-default.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/css-rtl/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/css-rtl/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/css-rtl/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/css-rtl/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/css-rtl/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/css-rtl/themes/semi-dark-layout.min.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/css-rtl/core/colors/palette-gradient.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/css-rtl/pages/dashboard-analytics.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/css-rtl/pages/card-analytics.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/css-rtl/plugins/tour/tour.min.css') }}">
    <!-- END: Page CSS-->
    <style>
        button.dropdown-item {
            width: 100%!important;
        }
        button.swal2-confirm.btn.btn-success {
            margin-right: 8px;
        }
        #brandText{
            font-size: 17px;
            margin-top: 2px;
        }
    </style>
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/app-assets/css-rtl/custom-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panelStyle/assets/css/style-rtl.css') }}">
    <!-- END: Custom CSS-->
    @yield('csspanel')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    @if(session('impersonated_by'))
                        <a href="{{route('impresent_leave')}}" style="float: left">
                            <button class="btn btn-warning">ورود به پنل مدیریت</button>
                        </a>
                    @endif
                </div>
                <ul class="nav navbar-nav float-right">

                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                    {{--                    <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>--}}
                    {{--                        <div class="search-input">--}}
                    {{--                            <div class="search-input-icon"><i class="feather icon-search primary"></i></div>--}}
                    {{--                            <input class="input" type="text" placeholder="جستجو در Vuexy ..." tabindex="-1" data-search="template-list">--}}
                    {{--                            <div class="search-input-close"><i class="feather icon-x"></i></div>--}}
                    {{--                            <ul class="search-list search-list-main"></ul>--}}
                    {{--                        </div>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>--}}
                    {{--                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">--}}
                    {{--                            <li class="dropdown-menu-header">--}}
                    {{--                                <div class="dropdown-header m-0 p-2">--}}
                    {{--                                    <h3 class="white">5 اعلان </h3><span class="notification-title">جدید برنامه</span>--}}
                    {{--                                </div>--}}
                    {{--                            </li>--}}
                    {{--                            <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
                    {{--                                    <div class="media d-flex align-items-start">--}}
                    {{--                                        <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>--}}
                    {{--                                        <div class="media-body">--}}
                    {{--                                            <h6 class="primary media-heading">شما سفارش جدید دارید !</h6><small class="notification-text">آیا قصد دارید امشب با من ملاقات کنید؟</small>--}}
                    {{--                                        </div><small>--}}
                    {{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 ساعت پیش</time></small>--}}
                    {{--                                    </div></a><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
                    {{--                                    <div class="media d-flex align-items-start">--}}
                    {{--                                        <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>--}}
                    {{--                                        <div class="media-body">--}}
                    {{--                                            <h6 class="success media-heading red darken-1">99% ظرفیت سرور پر است</h6><small class="notification-text">شما سفارش جدیدی از کالاها را دریافت کردید</small>--}}
                    {{--                                        </div><small>--}}
                    {{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 ساعت پیش</time></small>--}}
                    {{--                                    </div></a><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
                    {{--                                    <div class="media d-flex align-items-start">--}}
                    {{--                                        <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>--}}
                    {{--                                        <div class="media-body">--}}
                    {{--                                            <h6 class="danger media-heading yellow darken-3">اعلان های هشدار</h6><small class="notification-text">سرور 99% CPU را اشغال کرده</small>--}}
                    {{--                                        </div><small>--}}
                    {{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">امروز</time></small>--}}
                    {{--                                    </div></a><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
                    {{--                                    <div class="media d-flex align-items-start">--}}
                    {{--                                        <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>--}}
                    {{--                                        <div class="media-body">--}}
                    {{--                                            <h6 class="info media-heading">کار را تکمیل کنید</h6><small class="notification-text">کاپ کیک کنجد</small>--}}
                    {{--                                        </div><small>--}}
                    {{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">هفته گذشته</time></small>--}}
                    {{--                                    </div></a><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
                    {{--                                    <div class="media d-flex align-items-start">--}}
                    {{--                                        <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>--}}
                    {{--                                        <div class="media-body">--}}
                    {{--                                            <h6 class="warning media-heading">تهیه گزارش ماهانه</h6><small class="notification-text">لورم ایپسوم متن ساختگی با تولید سادگی.</small>--}}
                    {{--                                        </div><small>--}}
                    {{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">ماه اخیر</time></small>--}}
                    {{--                                    </div></a></li>--}}
                    {{--                            <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">دیدن تمام اعلان ها</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}

                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">
                                    {{auth()->user()->name ." ". auth()->user()->family}}
                                </span>
                                <span class="user-status">دردسترس</span>
                            </div>
                            <span>
                                <img class="round" @if(isset(auth()->user()->image->url)) src="/{{auth()->user()->image->url}}" @else src="/{{url('../../panelStyle/app-assets/images/portrait/small/avatar-s-18.png')}}"  @endif  alt="avatar" height="40" width="40">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('userDetail.profile')}}">
                                <i class="feather icon-user"></i> ویرایش نمایه
                            </a>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" onclick="logout()">
                                <i class="feather icon-power"></i> خروج
                            </button>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">فایل ها</h6></a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="../../panelStyle/app-assets/images/icons/xls.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">دو مورد جدید ثبت شد</p><small class="text-muted">مدیر فروش</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small></a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="../../panelStyle/app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 فایل عکس تهیه شده است</p><small class="text-muted">توسعه دهنده FrontEnd</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small></a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="../../panelStyle/app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 فایل PDF بارگذاری شده است</p><small class="text-muted">مدیر دیجیتال مارکتینگ</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small></a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="../../panelStyle/app-assets/images/icons/doc.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">طراح وب سایت</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small></a></li>
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">اعضا</h6></a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="../../panelStyle/app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">جواد محمدی</p><small class="text-muted">طراح رابط کاربری</small>
                </div>
            </div></a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="../../panelStyle/app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">مسعود اصغرزاده</p><small class="text-muted">توسعه دهنده FrontEnd</small>
                </div>
            </div></a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="../../panelStyle/app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">محمد نوریان</p><small class="text-muted">مدیر دیجیتال مارکتینگ</small>
                </div>
            </div></a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="../../panelStyle/app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">هانیه برخوردار</p><small class="text-muted">طراح وب سایت</small>
                </div>
            </div></a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>نتیجه ای پیدا نشد</span></div></a></li>
</ul>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="../../panelStyle/html/rtl/vertical-menu-template/index.html">

                    {{--                    <h5 class="brand-text mb-0" id="brandText">{{ title_website() }}</h5>--}}
                                        <h5 class="brand-text mb-0" id="brandText">فراخط پنل</h5>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i id="icondisc" class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}"><a href="/admin/dashboard"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">پیشخوان</span></a>
            </li>

            @if(Auth::user()->hasRole('manager'))
{{--                <li class=" nav-item {{ (request()->is('admin/page_list')) ? 'active' : '' }}"><a href="/admin/page_list "><i class="feather icon-file"></i><span class="menu-title" data-i18n="Email">لیست برگه ها</span></a>--}}
{{--                </li>--}}
{{--                <li class=" nav-item has-sub @if(str_contains(url()->current(), '/admin/category_news')) open @elseif(str_contains(url()->current(), '/admin/news/show')) open @endif"><a href="#"><i class="fa fa-newspaper-o"></i><span class="menu-title" data-i18n="Ecommerce">خبرها</span></a>--}}
{{--                    <ul class="menu-content">--}}
{{--                        <li class="{{ (request()->is('category/news*')) ? 'active' : '' }}">--}}
{{--                            <a href="{{route('category.index', ['type' => 'news'])}}">--}}
{{--                                <i class="feather icon-circle"></i>--}}
{{--                                <span class="menu-item" data-i18n="Shop">دسته بندی</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="{{ (request()->is('admin/category_news')) ? 'active' : '' }}"><a href="/admin/category_news"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">دسته بندی</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ (request()->is('admin/admin_news_list')) ? 'active' : '' }}"><a href="/admin/admin_news_list"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">خبر</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ (request()->is('admin/role_category_users_list')) ? 'active' : '' }}"><a href="/admin/role_category_users_list"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">سطح دسترسی دسته بندی</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ (request()->is('admin/news/create')) ? 'active' : '' }}"><a href="/admin/news/create"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">افزودن خبر</span></a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class=" nav-item has-sub @if(str_contains(url()->current(), '/admin/admin_list')) open @elseif(str_contains(url()->current(), '/admin/reporter_list')) open @elseif(str_contains(url()->current(), '/admin/user_list')) open @endif"><a href="#"><i class="feather icon-users"></i><span class="menu-title" data-i18n="User">کاربران</span></a>--}}
{{--                    <ul class="menu-content">--}}
{{--                        <li class="{{ (request()->is('admin/admin_list')) ? 'active' : '' }}"><a href="/admin/admin_list"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">مدیران</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ (request()->is('admin/reporter_list')) ? 'active' : '' }}"><a href="/admin/reporter_list"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">خبرنگاران</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ (request()->is('admin/user_list')) ? 'active' : '' }}"><a href="/admin/user_list"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">کاربران</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ (request()->is('admin/user_list')) ? 'active' : '' }}"><a href="/admin/user_list"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">بازاریابان</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ (request()->is('admin/teacher_list')) ? 'active' : '' }}"><a href="/admin/teacher_list"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">مدرسان</span></a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <li class=" nav-item has-sub @if(str_contains(url()->current(), 'admin/course')) open @endif @if(str_contains(url()->current(), 'admin/course_category')) open @endif">
                    <a href="#"><i class="fa fa-file-movie-o"></i>
                        <span class="menu-title" data-i18n="User">دوره ها</span>
                    </a>
                    <ul class="menu-content">

                        <li class="{{ (request()->is('admin/course')) ? 'active' : '' }}"><a href="{{route('course.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">دوره ها</span></a>
                        </li>
                        <li class="{{ (request()->is('admin/course_category')) ? 'active' : '' }}">
                            <a href="/admin/course_category">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item" data-i18n="Shop">دسته بندی</span>
                            </a>
                        </li>
{{--                        <li class="{{ (request()->is('admin/discount_admin')) ? 'active' : '' }}"> <a href="/admin/discount_admin"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">کدتخفیف</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ (request()->is('admin/teacher_courses')) ? 'active' : '' }}"> <a href="/admin/teacher_courses"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">دوره های معلم</span></a>--}}
{{--                        </li>--}}

                    </ul>
                </li>

                @endif

            @if(Auth::user()->hasRole('reporter'))
            <li class=" nav-item has-sub @if(str_contains(url()->current(), 'tag')) open @endif @if(str_contains(url()->current(), 'category/Post')) open @endif @if(str_contains(url()->current(), 'post/text')) open @endif @if(str_contains(url()->current(), 'post/image')) open @endif @if(str_contains(url()->current(), 'post/video')) open @endif">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="menu-title" data-i18n="User">خبرها </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('tag*')) ? 'active' : '' }}">
                        <a href="{{route('tag.index')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List"> تگ ها</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('category/Post')) ? 'active' : '' }}">
                        <a href="{{route('category.index', ['type'=> 'Post'])}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List">دسته بندی خبرها</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('categoryUser*')) ? 'active' : '' }}">
                        <a href="{{route('categoryUser.index')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List">سطح دسترسی دسته ها</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('post/text')) ? 'active' : '' }}">
                        <a href="{{route('post.index', ['type'=> 'text'])}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List">خبرهای متنی</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('post/image')) ? 'active' : '' }}">
                        <a href="{{route('post.index', ['type'=> 'image'])}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List">خبرهای تصویری</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('post/video')) ? 'active' : '' }}">
                        <a href="{{route('post.index', ['type'=> 'video'])}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List">خبرهای ویدیویی</span>
                        </a>
                    </li>

                </ul>
            </li>
            @endif






            @if(Auth::user()->hasRole('manager'))
            <li class=" nav-item has-sub @if(str_contains(url()->current(), 'userDetail/*')) open @endif"><a href="#"><i class="feather icon-users"></i><span class="menu-title" data-i18n="User">کاربران</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('userDetail/manager')) ? 'active' : '' }}">
                        <a href="{{route('userDetail.index', ['role' => 'manager'])}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List">مدیران</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('userDetail/reporter')) ? 'active' : '' }}">
                        <a href="{{route('userDetail.index', ['role' => 'reporter'])}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="View">خبرنگاران</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('userDetail/user')) ? 'active' : '' }}">
                        <a href="{{route('userDetail.index', ['role' => 'user'])}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Edit">کاربران</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('userDetail/marketer')) ? 'active' : '' }}">
                        <a href="{{route('userDetail.index', ['role' => 'marketer'])}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Edit">بازاریابان</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('userDetail/teacher')) ? 'active' : '' }}">
                        <a href="{{route('userDetail.index', ['role' => 'teacher'])}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Edit">مدرسان</span>
                        </a>
                    </li>
                </ul>
            </li>


                <li class=" nav-item has-sub @if(str_contains(url()->current(), 'jobs/*')) open @endif"><a href="#"><i class="fa fa-industry"></i><span class="menu-title" data-i18n="User">مشاغل</span></a>
                    <ul class="menu-content">
                        <li class="{{ (request()->is('jobs/company*')) ? 'active' : '' }}">
                            <a href="{{route('company.index')}}"><i class="feather icon-circle"></i>
                                <span class="menu-item" data-i18n="List">لیست شرکت ها</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('jobs/job*')) ? 'active' : '' }}">
                            <a href="{{route('job.index')}}"><i class="feather icon-circle"></i>
                                <span class="menu-item" data-i18n="List"> فرصت های شغلی</span>
                            </a>
                        </li>

                        <li class="{{ (request()->is('jobs/resume*')) ? 'active' : '' }}">
                            <a href="{{route('resume.index')}}"><i class="feather icon-circle"></i>
                                <span class="menu-item" data-i18n="List">  روزمه ها</span>
                            </a>
                        </li>
                    </ul>
                </li>


            @endif

            @if(Auth::user()->hasRole('marketer') || Auth::user()->hasRole('manager'))
            <li class=" nav-item has-sub @if(str_contains(url()->current(), 'discount*')) open @endif"><a href="#"><i class="fa fa-gift"></i><span class="menu-title" data-i18n="User">کد تخفیف</span></a>
                <ul class="menu-content">
                    @if(Auth::user()->hasRole('marketer'))
                        <li class="{{ (request()->is('discount/marketer*')) ? 'active' : '' }}">
                            <a href="{{route('discount.marketer.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item" data-i18n="List">دسته بندی  </span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->hasRole('manager'))
                        <li class="{{ (request()->is('discount/course')) ? 'active' : '' }}">
                            <a href="{{route('discount.index', ['type' => 'course'])}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item" data-i18n="List">  کد تخفیف  دوره  </span>
                            </a>
                        </li>

                        <li class="{{ (request()->is('discount/course_category')) ? 'active' : '' }}">
                            <a href="{{route('discount.index', ['type' => 'course_category'])}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item" data-i18n="List">  کد تخفیف دسته </span>
                            </a>
                        </li>
                            <li class="{{ (request()->is('discountUsage')) ? 'active' : '' }}">
                                <a href="{{route('discount.usage.index')}}">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-item" data-i18n="List">استفاده شده</span>
                                </a>
                            </li>
                    @endif
                </ul>
            </li>
            @endif
            @if(Auth::user()->hasRole('teacher') || Auth::user()->hasRole('manager'))
            <li class=" nav-item has-sub @if(str_contains(url()->current(), 'teachingRequest/*')) open @endif"><a href="#"><i class="fa fa fa-graduation-cap"></i><span class="menu-title" data-i18n="User">درخواست تدریس</span></a>
                <ul class="menu-content">
                    @if(Auth::user()->hasRole('teacher'))
                        <li class="{{ (request()->is('eachingRequest/create')) ? 'active' : '' }}">
                            <a href="{{route('teachingRequest.create')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item" data-i18n="List">ثبت درخواست تدریس  </span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->hasRole('manager'))
                        <li class="{{ (request()->is('teachingRequest')) ? 'active' : '' }}">
                            <a href="{{route('teachingRequest.index')}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item" data-i18n="List"> لیست درخواستهای تدریس   </span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            @endif

        @if(Auth::user()->hasRole('manager'))
                <li class=" nav-item {{ (request()->is('carts')) ? 'active' : '' }}">
                    <a href="{{route('carts.index')}}">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="menu-title" data-i18n="Email"> سبد خرید </span>
                    </a>
                </li>

                <li class=" nav-item {{ (request()->is('order')) ? 'active' : '' }}">
                    <a href="{{route('order.index')}}">
                        <i class="fa fa-list"></i>
                        <span class="menu-title" data-i18n="Email"> سفارشات</span>
                    </a>
                </li>
                <li class=" nav-item {{ (request()->is('fee')) ? 'active' : '' }}">
                    <a href="{{route('fee.index')}}">
                        <i class="fa fa-money"></i>
                        <span class="menu-title" data-i18n="Email"> تراکنش ها</span>
                    </a>
                </li>

                <li class=" nav-item {{ (request()->is('licenses')) ? 'active' : '' }}">
                    <a href="{{route('licenses.index')}}">
                        <i class="fa fa-id-card-o"></i>
                        <span class="menu-title" data-i18n="Email"> لایسنس ها</span>
                    </a>
                </li>

            @endif
            @if(Auth::user()->hasRole('manager'))
            <li class=" nav-item has-sub @if(str_contains(url()->current(), '/menu')) open @elseif(str_contains(url()->current(), '/contact-marketing')) open @elseif(str_contains(url()->current(), '/subscriber')) open @elseif(str_contains(url()->current(), '/contact-us')) open @elseif(str_contains(url()->current(), '/courseBanner')) open @elseif(str_contains(url()->current(), '/menu/tab')) open @elseif(str_contains(url()->current(), '/menu/section')) open @elseif(str_contains(url()->current(), '/adBanner')) open  @endif"><a href="#"><i class="fa fa-cogs"></i><span class="menu-title" data-i18n="User">تنظیمات</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('menu')) ? 'active' : '' }} {{ (request()->is('menu/create')) ? 'active' : '' }}">
                        <a href="{{route('menu.index')}}"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List"> منو اصلی</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('menu/section')) ? 'active' : '' }}">
                        <a href="{{route('menu.section.index')}}"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List">بخش ها </span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('menu/tab')) ? 'active' : '' }}{{ (request()->is('menu/tab/create')) ? 'active' : '' }}">
                        <a href="{{route('menu.tab.index')}}"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List"> تب ها </span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('/adBanner')) ? 'active' : '' }}{{ (request()->is('adBanner')) ? 'active' : '' }}">
                        <a href="{{route('adBanner.index')}}"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List"> بنر تبلیغاتی </span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('/courseBanner')) ? 'active' : '' }}{{ (request()->is('courseBanner')) ? 'active' : '' }}">
                        <a href="{{route('courseBanner.index')}}"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List"> اسلایدر دوره ها </span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('contact-us')) ? 'active' : '' }}">
                        <a href="{{route('contactUs.index')}}"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List"> ارتباط با ما </span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('subscriber')) ? 'active' : '' }}">
                        <a href="{{route('subscriber.index')}}"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List"> خبرنامه </span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('contact-marketing')) ? 'active' : '' }}">
                        <a href="{{route('contactMarketing.index')}}"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List"> مارکتینگ </span>
                        </a>
                    </li>



                </ul>
            </li>

            <li class=" nav-item {{ (request()->is('contact')) ? 'active' : '' }}">
                <a href="{{route('contact.index')}}">
                    <i class="fa fa-address-book"></i>
                    <span class="menu-title" data-i18n="Email">درخواستهای مشاوره</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->hasRole('marketer'))
                <li class=" nav-item {{ (request()->is('banner')) ? 'active' : '' }}">
                    <a href="{{route('banner.index')}}">
                        <i class="fa fa-picture-o"></i>
                        <span class="menu-title" data-i18n="Email">لیست  بنرها </span>
                    </a>
                </li>
            @endif
            <li class=" nav-item {{ (request()->is('language*')) ? 'active' : '' }}">
                <a href="{{route('language.index')}}">
                    <i class="fa fa-language"></i>
                    <span class="menu-title" data-i18n="Dashboard">زبان</span>
                </a>
            </li>
        </ul>
    </div>

</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">@yield('title')</h2>
                        <div class="breadcrumb-wrapper col-12">
                            @yield('breadcrumb')
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrum-right">
                    <div class="dropdown">
                        @yield('button')
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Customizer-->
<div class="customizer d-none d-md-block"><a class="customizer-close" href="#"><i class="feather icon-x"></i></a><a class="customizer-toggle" href="#"><i class="feather icon-settings fa fa-spin fa-fw white"></i></a><div class="customizer-content p-2">
        <h4 class="text-uppercase mb-0">تنظیم کننده تم</h4>
        <small>سفارشی سازی کنید و در لحظه پیش نمایش را ببینید</small>
        <hr>
        <!-- Menu Colors Starts -->
        <div id="customizer-theme-colors">
            <h5>رنگ های منو</h5>
            <ul class="list-inline unstyled-list">
                <li class="color-box bg-primary selected" data-color="theme-primary"></li>
                <li class="color-box bg-success" data-color="theme-success"></li>
                <li class="color-box bg-danger" data-color="theme-danger"></li>
                <li class="color-box bg-info" data-color="theme-info"></li>
                <li class="color-box bg-warning" data-color="theme-warning"></li>
                <li class="color-box bg-dark" data-color="theme-dark"></li>
            </ul>
        </div>
        <!-- Menu Colors Ends -->
        <hr>
        <!-- Theme options starts -->
        <h5 class="mt-1">تم صفحه</h5>
        <div class="theme-layouts">
            <div class="d-flex justify-content-start">
                <div class="mx-50 lidht">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" name="layoutOptions" value="false" class="layout-name" data-layout="" checked>
                            <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
            </span>
                            <span class="">روشن</span>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50 dark">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" name="layoutOptions" value="false" class="layout-name" data-layout="dark-layout">
                            <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
            </span>
                            <span class="">تاریک</span>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50 semi-dark">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" name="layoutOptions" value="false" class="layout-name" data-layout="semi-dark-layout">
                            <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
            </span>
                            <span class="">نیمه روشن</span>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <!-- Theme options starts -->
        <hr>

        <!-- Collapse sidebar switch starts -->

        <!-- Navbar colors starts -->
        <div id="customizer-navbar-colors">
            <h5>رنگ های نوار</h5>
            <ul class="list-inline unstyled-list">
                <li class="color-box bg-white border selected" data-navbar-default=""></li>
                <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
                <li class="color-box bg-success" data-navbar-color="bg-success"></li>
                <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
                <li class="color-box bg-info" data-navbar-color="bg-info"></li>
                <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
                <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
            </ul>
            <hr>
        </div>
        <!-- Navbar colors starts -->
        <!-- Navbar Type Starts -->

        <!-- Navbar Type Starts -->



        <!-- Hide Scroll To Top Ends-->
    </div>

</div>
<!-- End: Customizer-->

<!-- Buynow Button-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0">
{{--        <span class="float-md-left d-block d-md-inline-block mt-25"> {{ copyright_website() }}</span>--}}
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{ url('../../panelStyle/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src={{ url('../../panelStyle/app-assets/vendors/js/charts/apexcharts.min.js') }}""></script>
<script src="{{ url('../../panelStyle/app-assets/vendors/js/extensions/tether.min.js') }}"></script>
<script src="{{ url('../../panelStyle/app-assets/vendors/js/extensions/shepherd.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ url('../../panelStyle/app-assets/js/core/app-menu.min.js') }}"></script>
<script src="{{ url('../../panelStyle/app-assets/js/core/app.min.js') }}"></script>
<script src="{{ url('../../panelStyle/app-assets/js/scripts/components.min.js') }}"></script>
<script src="{{ url('../../panelStyle/app-assets/js/scripts/customizer.min.js') }}"></script>
<script src="{{ url('../../panelStyle/app-assets/js/scripts/footer.min.js') }}"></script>
<!-- END: Theme JS-->
@yield('script')
<script>
    $(document).ready(function (){
        var navbar=localStorage.getItem('background');
        var theme=localStorage.getItem('theme');
        var brand=localStorage.getItem('color_text');
        $('.header-navbar').addClass(navbar);
        $('.vertical-layout').addClass(theme);
        document.getElementById('brandText').style.color=brand
        document.getElementById('icondisc').style.color=brand
        var elements = $('.active a'); // get all elements
        for(var i = 0; i < elements.length; i++){
            elements[i].style.backgroundColor = brand;
        }
    })

</script>
<!-- BEGIN: Page JS-->
<script src="{{ url('../../panelStyle/app-assets/js/scripts/pages/dashboard-analytics.min.js') }}"></script>
<!-- END: Page JS-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function logout(){
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'ایا مطمئن هستی?',
            text: "ایا واقعا میخوای از پنل خارج شوید",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'بله, خارج میشم!',
            cancelButtonText: 'نه, دوست دارم بمونم!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var token = localStorage.getItem('Token');
                $.ajax({
                    url:"{{ route('logout') }}",
                    type:"POST",
                    data:{
                        "_token":"{{ csrf_token() }}"
                    },
                    success:function (response){
                        if (response.status == 402){
                            document.getElementById('MessageError').innerHTML=response.message;
                        }else{
                            localStorage.removeItem("Token");
                            location.href='/login'
                        }
                    }

                })

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
            }

        })

    }
</script>
</body>
<!-- END: Body-->
</html>
