<div class="form-body">
    <div class="row">
        <div class="col-12">
            <div class="form-label-group">
                <h6> دوره</h6>
                <select id="course_id" class="form-control" name="course_id">
                    <option disabled>لطفا   دوره را انتخاب نمایید</option>
                    @foreach($data['courses'] as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->title_course ?? '' }}
                        </option>
                    @endforeach
                </select>
                <label for="discount_marketer_id">  دوره </label>
            </div>
            @include('category::components.validationError', ['data' => 'course_id'])
        </div>
        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="position" class="form-control" name="position" value="{{ $data['adBanner']->position ?? old('position') }}">
                <label for="position"> موقعیت بنر(حتما عدد وارد شود)</label>
            </div>
            @include('adBanner::components.validationError', ['data' => 'position'])
        </div>


        <div class="col-12">
            <div class="form-label-group">
                <input type="file" id="image" class="form-control" name="image">
                <label for="image">
                    تصویر
                </label>
            </div>
            @include('adBanner::components.validationError', ['data' => 'image'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="link" class="form-control" name="link" value="{{ $data['adBanner']->link ?? old('link') }}">
                <label for="image">
                    لینک
                </label>
            </div>
            @include('adBanner::components.validationError', ['data' => 'link'])
        </div>

        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
            <button id="" type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                ذخیره تغییرات
            </button>

        </div>
    </div>
</div>
