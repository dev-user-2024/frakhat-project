<div class="form-body">
    <div class="row">

        <div class="col-12">
            <div class="form-label-group">
                <h6>  موقعیت بنر</h6>
                <select id="position" class="form-control" name="position">
                    <option disabled selected>موقعیت بنر</option>
                    <option value="sidebar"{{ (old('position') == 'sidebar' || (isset($data['adBanner']) && $data['adBanner']->position == 'sidebar')) ? ' selected' : '' }}>نوار کناری</option>
                    <option value="section1"{{ (old('position') == 'section1' || (isset($data['adBanner']) && $data['adBanner']->position == 'section1')) ? ' selected' : '' }}>سکشن اول</option>
                    <option value="section2"{{ (old('position') == 'section2' || (isset($data['adBanner']) && $data['adBanner']->position == 'section2')) ? ' selected' : '' }}>سکشن دوم</option>
                    <option value="nearCourse"{{ (old('position') == 'nearCourse' || (isset($data['adBanner']) && $data['adBanner']->position == 'nearCourse')) ? ' selected' : '' }}>کناردوره ها</option>
                </select>
                <label for="position"> موقعیت بنر</label>
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
