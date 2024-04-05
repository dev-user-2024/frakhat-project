<section id="floating-label-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card" style="height: auto;">
                <div class="card-header">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" id="VideoSave" action="{{route('Company.store')}}" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{ auth()->id()}}">
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="first-name-floating" class="form-control" placeholder="نام(فارسی)" name="name_fa">
                                            <label for="first-name-floating">نام(فارسی)</label>
                                        </div>
                                        <p id="name_fa" class="text-danger text-right"></p>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="first-name-floating" class="form-control" placeholder="نام(انگلیسی)" name="name_en">
                                            <label for="first-name-floating">نام(انگلیسی)</label>
                                        </div>
                                        <p id="name_en" class="text-danger text-right"></p>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="first-name-floating" class="form-control" placeholder="سال تاسیس" name="establishedYear">
                                            <label for="first-name-floating">سال تاسیس</label>
                                        </div>
                                        <p id="establishedYear" class="text-danger text-right"></p>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="first-name-floating" class="form-control" placeholder="تعداد کارکنان" name="numberOfPersons">
                                            <label for="first-name-floating">تعداد کارکنان</label>
                                        </div>
                                        <p id="numberOfPersons" class="text-danger text-right"></p>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="first-name-floating" class="form-control" placeholder="آدرس" name="address">
                                            <label for="first-name-floating">آدرس</label>
                                        </div>
                                        <p id="address" class="text-danger text-right"></p>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="first-name-floating" class="form-control" placeholder="وبسایت" name="website">
                                            <label for="first-name-floating">وبسایت</label>
                                        </div>
                                        <p id="website" class="text-danger text-right"></p>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="first-name-floating" class="form-control" placeholder="توضیحات" name="description">
                                            <label for="first-name-floating">توضیحات</label>
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
