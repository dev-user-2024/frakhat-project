<div class="form-body">
    <div class="row">
        <div class="col-6">
            <h6>تگها</h6>
            <div class="form-label-group">
                <select id="tag_id" class="form-control select-two" multiple name="tag_id[]">
                    <option disabled>لطفا انتخاب نمایید</option>
                    @foreach($data['tags'] as $item)
                        <option value="{{ $item->id }}" {{ in_array($item->id, old('tag_id', [])) ? 'selected' : '' }} @if(array_key_exists('job', $data)) {{ $data['job']->tags->contains($item) ? 'selected' : '' }} @endif>
                            {{ $item->tagTranslations->first()->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('job::components.validationError', ['data' => 'tag_id'])
        </div>
        <div class="col-6">
            <h6>شرکت ها</h6>
            <div class="form-label-group">
                <select id="company_id" class="form-control" name="company_id">
                    <option disabled>لطفا شرکت را انتخاب نمایید</option>
                    @foreach($data['companies'] as $item)
                        <option value="{{ $item->id }}" {{ $item->id == ($data['job']->company_id ?? old('company_id')) ? 'selected' : '' }}>
                            {{ $item->name_fa }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('job::components.validationError', ['data' => 'company_id'])
        </div>
        <div class="col-12">
            <h6>دوره ها</h6>
            <div class="form-label-group">
                <select id="course_id" class="form-control" name="course_id">
                    <option disabled>لطفا دوره را انتخاب نمایید</option>
                    @foreach($data['courses'] as $item)
                        <option value="{{ $item->id }}" {{ $item->id == ($data['job']->course_id ?? old('course_id')) ? 'selected' : '' }}>
                            {{ $item->title_course }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('job::components.validationError', ['data' => 'course_id'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="title" class="form-control" name="title" value="{{ $data['job']->title ?? old('title') }}">
                <label for="title">عنوان موقعیت شغلی</label>
            </div>
            @include('job::components.validationError', ['data' => 'title'])
        </div>

        <div class="col-12">
            <h6> موقعیت مکانی</h6>
            <div class="form-label-group">
                <select id="province_id" class="form-control" name="province_id">
                    <option disabled>لطفا انتخاب نمایید</option>
                    @foreach($data['provinces'] as $item)
                        <option value="{{ $item->id }}" {{ $item->id == ($data['job']->province_id ?? old('province_id')) ? 'selected' : '' }}>
                            {{ $item->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('job::components.validationError', ['data' => 'province_id'])
        </div>

        <div class="col-12">
            <h6>گروه شغلی</h6>
            <div class="form-label-group">
                <select id="job_group_id" class="form-control select-two" multiple name="job_group_id[]">
                    <option disabled>لطفا انتخاب نمایید</option>
                    @foreach($data['job_groups'] as $item)
                        <option value="{{ $item->id }}" {{ in_array($item->id, old('job_group_id', [])) ? 'selected' : '' }} @if(array_key_exists('job', $data)) {{ $data['job']->jobGroups->contains($item) ? 'selected' : '' }} @endif>
                            {{ $item->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('job::components.validationError', ['data' => 'job_group_id'])
        </div>

        <div class="col-12">
            <h6> نوع همکاری</h6>
            <div class="form-label-group">
                <select id="employment_type" class="form-control" name="employment_type">
                    <option disabled>لطفا انتخاب نمایید</option>
                    @foreach(config('job.employment_type') as $item)
                        <option value="{{ $item }}" {{ $item == ($data['job']->employment_type ?? old('employment_type')) ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('job::components.validationError', ['data' => 'employment_type'])
        </div>

        <div class="col-12">
            <h6>  حداقل حقوق</h6>
            <div class="form-label-group">
                <select id="minimum_salary" class="form-control" name="minimum_salary">
                    <option disabled>لطفا انتخاب نمایید</option>
                    @foreach(config('job.minimum_salary') as $item)
                        <option value="{{ $item }}" {{ $item == ($data['job']->minimum_salary ?? old('minimum_salary')) ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('job::components.validationError', ['data' => 'minimum_salary'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <textarea id="job_description" class="form-control" name="job_description">{{ $data['job']->job_description ?? old('job_description') }}</textarea>
                <label for="job_description">شرح موقعیت شغلی</label>
            </div>
            @include('job::components.validationError', ['data' => 'job_description'])
        </div>

        <div class="col-12">
            <h6>حداقل سابقه کار</h6>
            <div class="form-label-group">
                <select id="minimum_experience" class="form-control" name="minimum_experience">
                    <option disabled>لطفا انتخاب نمایید</option>
                    @foreach(config('job.minimum_experience') as $item)
                        <option value="{{ $item }}" {{ $item == ($data['job']->minimum_experience ?? old('minimum_experience')) ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('job::components.validationError', ['data' => 'minimum_experience'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <select id="gender" class="form-control" name="gender">
                    <option value="female" {{ (isset($data['job']) && $data['job']->gender == 'female') ? 'selected' : '' }}>زن</option>
                    <option value="male" {{ (isset($data['job']) && $data['job']->gender == 'male') ? 'selected' : '' }}>مرد</option>
                    <option value="default" {{ (isset($data['job']) && $data['job']->gender == 'default') ? 'selected' : '' }}>مهم نیست</option>
                </select>
                <label for="gender">جنسیت</label>
            </div>
            @include('job::components.validationError', ['data' => 'gender'])
        </div>

        <div class="col-12">
            <h6>وضعیت سربازی</h6>
            <div class="form-label-group">
                <select id="military_status" class="form-control" name="military_status">
                    <option disabled>لطفا انتخاب نمایید</option>
                    @foreach(config('job.military_status') as $item)
                        <option value="{{ $item }}" {{ $item == ($data['job']->military_status ?? old('military_status')) ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('job::components.validationError', ['data' => 'military_status'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="insurance_status" class="form-control" name="insurance_status" value="{{ $data['job']->insurance_status ?? old('insurance_status') }}">
                <label for="insurance_status">وضعیت بیمه</label>
            </div>
            @include('job::components.validationError', ['data' => 'insurance_status'])
        </div>

        <div class="col-12">
            <h6 for="skills">مهارت‌ها</h6>
            <div class="form-label-group" id="skills-input-container">

                <div class="skill-row">
                    <input type="text"  name="skills[]" class="tags-input form-control new-skill" required>
                    <button type="button" class="remove-skill">❌</button>
                </div>
            </div>


            @include('job::components.validationError', ['data' => 'insurance_status'])
        </div>


        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
            <button type="button"  class="btn btn-flat-info glow mb-1 mb-sm-0 mr-0 mr-sm-1" id="add-skill">اضافه کردن مهارت</button>
            <button id="" type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                ذخیره تغییرات
            </button>
        </div>
    </div>
</div>

