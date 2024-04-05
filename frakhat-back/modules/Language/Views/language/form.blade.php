<div class="form-body">
    <div class="row">
        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="title" class="form-control"  name="title" value="{{ $data['language']->title ?? old('title') }}">
                <label for="title">عنوان زبان  </label>
            </div>
            @include('language::components.validationError', ['data' => 'title'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="code" class="form-control"  name="code" value="{{ $data['language']->code ?? old('code') }}">
                <label for="code">کد  زبان </label>
            </div>
            @include('language::components.validationError', ['data' => 'code'])
        </div>

        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
            <button id="" type="submit"  class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                ذخیره تغییرات
            </button>

        </div>
    </div>
</div>
