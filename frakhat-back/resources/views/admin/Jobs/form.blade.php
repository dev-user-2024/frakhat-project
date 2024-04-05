<section id="floating-label-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card" style="height: auto;">
                <div class="card-header">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" id="VideoSave" action="{{route('Job.store')}}" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{ auth()->id()}}">
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="first-name-floating" class="form-control" placeholder="عنوان" name="title">
                                            <label for="first-name-floating">عنوان</label>
                                        </div>
                                        <p id="title" class="text-danger text-right"></p>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <select id="course_id" class="form-control" name="course_id">
                                                <option disabled>لطفا  دوره را انتخاب نمایید</option>
                                                @foreach($courses as $course)
                                                    <option value="{{ $course->id }}">
                                                        {{ $course->title_course }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <select id="TypeOfCooperation"  class="form-control" name="TypeOfCooperation" >
                                                <option disabled>
                                                    لطفا نوع همکاری را انتخاب نمایید
                                                </option>
                                                <option value="تمام وقت">
                                                    تمام وقت
                                                </option>
                                                <option value=" پاره وقت">
                                                    پاره وقت
                                                </option>
                                                <option value="پروژه ای">
                                                    پروژه ای
                                                </option>
                                                <option value="دورکاری">
                                                    دورکاری
                                                </option>
                                                <option value="کارآموزی">
                                                    کارآموزی
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="first-name-floating" class="form-control" placeholder="حداقل حقوق" name="MinimumSalary">
                                            <label for="first-name-floating">حداقل حقوق</label>
                                        </div>
                                        <p id="MinimumSalary" class="text-danger text-right"></p>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="first-name-floating" class="form-control" placeholder="حداقل سابقه کار" name="MinimumWorkExperience">
                                            <label for="first-name-floating">حداقل سابقه کار</label>
                                        </div>
                                        <p id="MinimumWorkExperience" class="text-danger text-right"></p>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <select id="gender"  class="form-control" name="gender" >
                                                <option disabled>
                                                    لطفا جنسیت را انتخاب نمایید
                                                </option>
                                                <option value="male">
                                                    مرد
                                                </option>
                                                <option value="female">
                                                    زن
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <select id="MinimumEducationDegree"  class="form-control" name="MinimumEducationDegree" >
                                                <option disabled>
                                                    لطفا حداقل مدرک تحصیلی را انتخاب نمایید
                                                </option>
                                                <option value="فوق دکترا">
                                                    فوق دکترا
                                                </option>
                                                <option value="دکترا">
                                                    دکترا
                                                </option>
                                                <option value="کارشناسی ارشد">
                                                    کارشناسی ارشد
                                                </option>
                                                <option value="کارشناسی">
                                                    کارشناسی
                                                </option>
                                                <option value="کاردانی">
                                                    کاردانی
                                                </option>
                                                <option value="سیکل">
                                                    سیکل
                                                </option>
                                                <option value="بی سواد">
                                                    بی سواد
                                                </option>
                                                <option value="فرقی ندارد">
                                                    فرقی ندارد
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <select id="militaryServiceSituation"  class="form-control" name="militaryServiceSituation" >
                                                <option disabled>
                                                    لطفا وضعیت خدمت سربازی را انتخاب نمایید
                                                </option>
                                                <option value="دارای کارت پایان خدمت">
                                                    دارای کارت پایان خدمت
                                                </option>
                                                <option value="معاف">
                                                    معاف
                                                </option>
                                                <option value="درحال تحصیل">
                                                    درحال تحصیل
                                                </option>
                                                <option value="فرقی ندارد">
                                                    فرقی ندارد
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input style="padding: 150px;" type="text" id="first-name-floating" class="form-control" placeholder="شرح موقعیت شغلی" name="description">
                                            <label for="first-name-floating">شرح موقعیت شغلی</label>
                                        </div>
                                        <p id="description" class="text-danger text-right"></p>
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
