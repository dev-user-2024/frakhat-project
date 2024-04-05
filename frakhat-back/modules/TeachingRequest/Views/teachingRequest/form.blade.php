<div class="form-body">
    <div class="row">
        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="subject" class="form-control" name="subject" value="{{ old('subject') }}">
                <label for="subject">موضوع تدریس *</label>
            </div>
                @include('teachingRequest::components.validationError', ['data' => 'subject'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <textarea id="message" class="form-control" name="message">{{ old('message') }}</textarea>
                <label for="message">توضیحات</label>
            </div>
            @include('teachingRequest::components.validationError', ['data' => 'message'])
        </div>

        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
            <button id="" type="submit"  class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                ذخیره تغییرات
            </button>
        </div>
    </div>
</div>
