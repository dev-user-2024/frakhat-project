<div class="form-body">
    <div class="row">
        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="name_fa" class="form-control" name="name_fa" value="{{ $data['company']->name_fa ?? old('name_fa') }}">
                <label for="name_fa">اسم فارسی شرکت</label>
            </div>
            @include('job::components.validationError', ['data' => 'name_fa'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="name_en" class="form-control" name="name_en" value="{{ $data['company']->name_en ?? old('name_en') }}">
                <label for="name_en">اسم انگلیسی شرکت</label>
            </div>
            @include('job::components.validationError', ['data' => 'name_en'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="number" id="established_year" class="form-control" name="established_year" value="{{ $data['company']->established_year ?? old('established_year') }}">
                <label for="established_year">سال تاسیس</label>
            </div>
            @include('job::components.validationError', ['data' => 'established_year'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="file" id="logo" class="form-control" name="logo">
                <label for="logo">لوگو</label>
            </div>
            @include('job::components.validationError', ['data' => 'logo'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="number_of_persons" class="form-control" name="number_of_persons" value="{{ $data['company']->number_of_persons ?? old('number_of_persons') }}">
                <label for="number_of_persons">تعداد نفرات</label>
            </div>
            @include('job::components.validationError', ['data' => 'number_of_persons'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <textarea id="description" class="form-control" name="description">{{ $data['company']->description ?? old('description') }}</textarea>
                <label for="description">توضیحات</label>
            </div>
            @include('job::components.validationError', ['data' => 'description'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="address" class="form-control" name="address" value="{{ $data['company']->address ?? old('address') }}">
                <label for="address">آدرس</label>
            </div>
            @include('job::components.validationError', ['data' => 'address'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="industry" class="form-control" name="industry" value="{{ $data['company']->industry ?? old('industry') }}">
                <label for="industry">حوزه کاری</label>
            </div>
            @include('job::components.validationError', ['data' => 'industry'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="website" class="form-control" name="website" value="{{ $data['company']->website ?? old('website') }}">
                <label for="website">آدرس وب سایت شرکت</label>
            </div>
            @include('job::components.validationError', ['data' => 'website'])
        </div>

        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
            <button id="" type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                ذخیره تغییرات
            </button>
        </div>
    </div>
</div>
