@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('userDetail_'.$data['role'].'_edit') }}--}}
@endsection
@section('title')
    پروفایل  من
@endsection
@section('script')
    @include('userDetail::components.btnSubmitScript')
@endsection

@section('content')

    <section class="users-edit">
        @if (Session::has('error'))
            <div class="flash alert alert-danger" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                @if(is_array(Session::get('error')))
                    @foreach(Session::get('error') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @else
                    <p>{{ htmlspecialchars(Session::get('error')) }}</p>
                @endif

            </div>
        @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center @if(session('type_update') == 'updateProfile') 'active' @endif" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">حساب</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center @if(session('type_update') && session('type_update') == 'updateProfile') 'active' @elseif(!session()->has('type_update')) 'active' @endif" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                <i class="feather icon-lock mr-25"></i><span class="d-none d-sm-block">تغییر رمزعبور</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane @if(session('type_update') && session('type_update') == 'updateProfile') 'active' @elseif(!session()->has('type_update')) 'active' @endif" id="account" aria-labelledby="account-tab" role="tabpanel">
                            <!-- users edit media object start -->
                            <div class="media mb-2">
                                <a class="mr-2 my-25" href="#">
                                    <img src="/{{ auth()->user()->image->url ?? url('../../panelStyle/app-assets/images/portrait/small/avatar-s-18.png') }}" alt="users avatar" class="users-avatar-shadow rounded" width="90" height="90">
                                </a>
                                <div class="media-body mt-50">
                                    <h4 class="media-heading">{{ auth()->user()->full_name ?? ''}}</h4>
                                </div>
                            </div>
                            <!-- users edit media object ends -->
                            <!-- users edit account form start -->
                            <form action="{{route('userDetail.profile.update', auth()->id())}}"  method="post" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>نام کاربری(ایمیل)</label>
                                                <input type="text" class="form-control" readonly placeholder="نام کاربری" value="{{ auth()->user()->email }}" required="" data-validation-required-message="This username field is required">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>نام</label>
                                                <input type="text" class="form-control" placeholder="نام" value="{{ auth()->user()->name ?? old('name')}}" name="name">
                                                <div class="help-block"></div>
                                            </div>
                                            <p id="name" class="text-danger text-right"></p>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>شماره همراه</label>
                                                <input type="text" class="form-control" placeholder="شماره همراه" value="{{ auth()->user()->mobile ?? old('mobile')}}" disabled name="mobile">
                                                <div class="help-block"></div>
                                                <p id="mobile" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>نام خانوادگی</label>
                                                <input type="text" class="form-control" placeholder="نام خانوادگی" value="{{ auth()->user()->family ?? old('family')}}" name="family">
                                                <div class="help-block"></div>
                                                <p id="family" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>اپلود تصویر </label>
                                                <input type="file" class="form-control" name="image" value="{{old('image')}}">
                                                <div class="help-block"></div>
                                                <p id="image" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                    </div>

                                    @if(Auth::user()->hasRole('teacher') || Auth::user()->hasRole('marketer'))
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                            <div class="controls">
                                                <label>شماره شبا</label>
                                                <input type="text" class="form-control" placeholder="شماره شبا" value="{{ auth()->user()->userDetail->shaba_number  ?? old('shaba_number')}}" name="shaba_number">
                                                <div class="help-block"></div>
                                                <p id="shabanumberss" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                            <div class="controls">
                                                <label>شماره کارت</label>
                                                <input type="text" class="form-control" placeholder="شماره کارت" value="{{ auth()->user()->userDetail->card_number  ?? old('card_number')}}" name="card_number">
                                                <div class="help-block"></div>
                                            </div>
                                            <p id="cardnumberss" class="text-danger text-right"></p>
                                        </div>
                                        </div>
                                    @endif
                                    @if(Auth::user()->hasRole('marketer'))
                                        <div class="col-lg-12 my-3">
                                            <input type="text" class="form-control" name="myvalue"  id="myvalue" @if(isset(auth()->user()->userDetail->code)) value="{{ url('/api/homepage/homepage_website?code='.auth()->user()->userDetail->code) }}" @endif readonly  />
                                            <button class="btn btn-primary mt-2 w-100" type="button" onclick="copyToClipboard()">کپی کردن لینک خودم</button>
                                        </div>
                                    @endif

                                    @if(Auth::user()->hasRole('teacher') || Auth::user()->hasRole('reporter'))
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group">
                                            <div class="controls">
                                                <label>کدملی</label>
                                                <input type="text" class="form-control" placeholder="کدملی" value="{{ auth()->user()->userDetail->national_code ?? old('national_code') }}" name="national_code">
                                                <div class="help-block"></div>
                                                <p id="nationalcodess" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                        </div>
                                    @endif
                                    @if(Auth::user()->hasRole('reporter'))
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                            <div class="controls">
                                                <label>اپلود کارت ملی</label>
                                                <input type="file" class="form-control"  name="upload_national_code" value="{{old('upload_national_code')}}">
                                                <div class="help-block"></div>
                                                <p id="uploadcodemiliReporter" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                        </div>
                                    @endif
                                    @if(Auth::user()->hasRole('reporter') || Auth::user()->hasRole('teacher'))
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>آدرس</label>
                                                <input type="text" class="form-control" placeholder="آدرس" value="{{ auth()->user()->userDetail->address  ?? old('address')}}" name="address">
                                                <div class="help-block"></div>
                                            </div>
                                            <p id="addressReporter" class="text-danger text-right"></p>
                                        </div>
                                    </div>
                                    @endif
                                    @if(Auth::user()->hasRole('teacher'))
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>هیئت علمی دانشگاه</label>
                                                    <select name="University_faculty" class="form-control" >
                                                        <option>انتخاب کنید</option>
                                                        <option value="نیستم" @if(auth()->user()->userDetail && auth()->user()->userDetail->University_faculty == 'نیستم') selected @endif>نیستم</option>
                                                        <option value="علمی" @if(auth()->user()->userDetail && auth()->user()->userDetail->University_faculty == 'علمی') selected @endif>علمی</option>
                                                        <option value="آزاد و پیام نور" @if(auth()->user()->userDetail && auth()->user()->userDetail->University_faculty == 'آزاد و پیام نور') selected @endif>آزاد و پیام نور</option>
                                                    </select>
                                                    <div class="help-block"></div>
                                                    <p id="Universityfacultyss" class="text-danger text-right"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>نوع اموزش</label>
                                                    <input type="text" class="form-control" placeholder="نوع اموزش" value="{{ auth()->user()->userDetail->type_learn ?? old('type_learn') }}" name="type_learn">
                                                    <div class="help-block"></div>
                                                </div>
                                                <p id="typelearnss" class="text-danger text-right"></p>

                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>ایا قبلا با فراخط همکاری داشتید؟</label>
                                                    <input type="text" class="form-control" placeholder="ایا قبلا با فراخط همکاری داشتید" value="{{ auth()->user()->userDetail->hiring_frakhat ?? old('hiring_frakhat') }}" name="hiring_frakhat">
                                                    <div class="help-block"></div>
                                                </div>
                                                <p id="hiringfrakhatss" class="text-danger text-right"></p>

                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">

                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>مدرک تحصیلی</label>
                                                    <select name="status_education" class="form-control" id="">
                                                        <option>انتخاب کنید</option>
                                                        <option value="دانشجوری کارشناسی" @if(auth()->user()->userDetail && auth()->user()->userDetail->status_education == 'دانشجوری کارشناسی') selected @endif>دانشجوری کارشناسی</option>
                                                        <option value="فارغ التحصیل کاردانی" @if(auth()->user()->userDetail && auth()->user()->userDetail->status_education == 'فارغ التحصیل کاردانی') selected @endif>فارغ التحصیل کاردانی</option>
                                                        <option value="فارغ التحصیل کارشناسی" @if(auth()->user()->userDetail && auth()->user()->userDetail->status_education == 'فارغ التحصیل کارشناسی') selected @endif>فارغ التحصیل کارشناسی</option>
                                                        <option value="دانشجوی ارشد" @if(auth()->user()->userDetail && auth()->user()->userDetail->status_education == 'دانشجوی ارشد') selected @endif>دانشجوی ارشد</option>
                                                        <option value="فارغ التحصیل ارشد" @if(auth()->user()->userDetail && auth()->user()->userDetail->status_education == 'فارغ التحصیل ارشد') selected @endif>فارغ التحصیل ارشد</option>
                                                        <option value="دانشجوی دکتر" @if(auth()->user()->userDetail && auth()->user()->userDetail->status_education == 'دانشجوی دکتر') selected @endif>دانشجوی دکتر</option>
                                                        <option value="فارغ التحصیل دکترا" @if(auth()->user()->userDetail && auth()->user()->userDetail->status_education == 'فارغ التحصیل دکترا') selected @endif>فارغ التحصیل دکترا</option>
                                                    </select>
                                                    <div class="help-block"></div>
                                                    <p id="statuseducationsss" class="text-danger text-right"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="controls">
                                                <label>قبض(آب ، برق ، گاز،تلفن)</label>
                                                <input type="file" class="form-control" placeholder="قبض(آب ، برق ، گاز،تلفن)" value="{{ auth()->user()->userDetail->fish_water ?? old('fish_water')}}" name="fish_water">
                                                <div class="help-block"></div>
                                                <p id="fishwaterss" class="text-danger text-right"></p>
                                            </div>
                                        </div>
                                        </div>
                                    @endif


                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit" id="btnRequest" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"> ذخیره تغییرات</button>
                                        <button id="btnshow" class="btn btn-primary" type="button" disabled style="display: none">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            منتظر بمانید...
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                @if(auth()->user()->userDetail && auth()->user()->userDetail->upload_national_code)
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>تصویر کارت ملی</label>
                                                <a class="mr-2 my-25" target="_blank" href="/{{ auth()->user()->userDetail->upload_national_code }}">
                                                    <img src="/{{ auth()->user()->userDetail->upload_national_code }}" alt="users avatar" class="users-avatar-shadow rounded" width="90" height="90">
                                                </a>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(auth()->user()->userDetail && auth()->user()->userDetail->fish_water)
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label> قبض(آب ، برق ، گاز،تلفن) </label>
                                                <a class="mr-2 my-25" target="_blank" href="/{{ auth()->user()->userDetail->fish_water }}">
                                                    <img src="/{{ auth()->user()->userDetail->fish_water }}" alt="users avatar" class="users-avatar-shadow rounded" width="90" height="90">
                                                </a>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                            </div>


                            <!-- users edit account form ends -->
                        </div>
                        <div class="tab-pane @if(session('type_update') == 'changePassword') 'active' @endif" id="information" aria-labelledby="information-tab" role="tabpanel">
                            <!-- users edit Info form start -->
                            <form action="{{route('userDetail.change-password')}}" id="ChangePassword" method="post">
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
                                                <input type="password"  name="password" class="form-control"  placeholder="رمزعبور جدید" >
                                                <div class="help-block"></div>
                                                <p id="newpasswordAdmin" class="text-danger text-right"></p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>تکرار رمزعبور جدید</label>
                                                <input type="password" name="password_confirmation" class="form-control"  placeholder="تکرار رمزعبور جدید" >
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
