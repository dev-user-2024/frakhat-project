<div class="form-body">
    <div class="row">
        <div class="col-6">
            <h6> نوع</h6>
            <div class="form-label-group">
                <select id="type"  class="form-control"  name="type" >
                    <option disabled>لطفا  نوع ان را انتخاب نمایید</option>
                    <option value="text">متنی</option>
                    <option value="image">تصویری</option>
                    <option value="video">ویدیویی</option>
                </select>
            </div>
            @include('menu::components.validationError', ['data' => 'type'])
        </div>
        <div class="col-6">
            <h6>دسته بندی</h6>
            <div class="form-label-group">
                <select id="category_id"  class="form-control"  name="category_id" >
                    <option disabled>لطفا دسته بندی را انتخاب نمایید</option>
                    @foreach($data['categories'] as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->categoryTranslations->first()->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('menu::components.validationError', ['data' => 'category_id'])
        </div>

        <div class="col-6">
            <h6> بخش</h6>
            <div class="form-label-group">
                <select id="section_id"  class="form-control"  name="section_id" >
                    <option disabled>لطفا  بخش ان را انتخاب نمایید</option>
                    @foreach($data['sections'] as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('menu::components.validationError', ['data' => 'section_id'])
        </div>
        <div class="col-6">
            <h6> موقعیت</h6>
            <div class="form-label-group">
                <select id="position"  class="form-control"  name="position" >
                    <option disabled>لطفا  موقعیت ان را انتخاب نمایید</option>
                    <option value="A">اول</option>
                    <option value="B">دوم</option>
                    <option value="C">سوم</option>
                </select>
            </div>
            @include('menu::components.validationError', ['data' => 'position'])
        </div>



        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
            <button id="" type="submit"  class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                ذخیره تغییرات
            </button>

        </div>
    </div>
</div>
