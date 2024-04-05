<div class="form-body">
    <div class="row">
        <input type="hidden" name="type" value="{{$data['type']}}">
        <div class="col-6">
            <h6>دسته بندی</h6>
            <div class="form-label-group">
                <select id="category_id" class="form-control select-two" multiple name="category_id[]">
                    <option disabled>لطفا دسته بندی را انتخاب نمایید</option>
                    @foreach($data['categories'] as $item)
                        <option value="{{ $item->id }}" {{ in_array($item->id, old('category_id', [])) ? 'selected' : '' }}>
                            {{ $item->categoryTranslations->first()->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('post::components.validationError', ['data' => 'category_id'])
        </div>
        <div class="col-6">
            <h6>تگها</h6>
            <div class="form-label-group">
                <select id="tag_id" class="form-control select-two" multiple name="tag_id[]">
                    <option disabled>لطفا  تگها را انتخاب نمایید</option>
                    @foreach($data['tags'] as $item)
                        <option value="{{ $item->id }}" {{ in_array($item->id, old('tag_id', [])) ? 'selected' : '' }}>
                            {{ $item->tagTranslations->first()->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('post::components.validationError', ['data' => 'tag_id'])
        </div>
        <div class="col-12">
            <div class="form-label-group">
                <input type="file" id="image" class="form-control" name="image">
                <label for="image">
                    @if($data['type'] == 'video')
                        کاور ویدیو
                    @else
                        تصویر شاخص
                    @endif
                </label>
            </div>
            @include('post::components.validationError', ['data' => 'image'])
        </div>
        @if($data['type'] == 'image')
            <div class="col-12">
                <div class="form-label-group">
                    <input type="file" id="imageables" class="form-control" name="imageables[]" multiple>
                    <label for="imageables">
                        تصاویر
                    </label>
                </div>
                @include('post::components.validationError', ['data' => 'imageables'])
            </div>
        @endif
        @if($data['type'] == 'video')
            <div class="col-12">
                <div class="form-label-group">
                    <input type="file" id="videoable" class="form-control" name="videoable">
                    <label for="videoable">
                        ویدیو
                    </label>
                </div>
                @include('post::components.validationError', ['data' => 'videoable'])
            </div>
        @endif

        <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
            @foreach($data['languages'] as $item)
                <li class="nav-item">
                    <a class="nav-link{{ $loop->first ? ' active' : '' }}" id="{{$item->code}}-tab-justified" data-toggle="tab" href="#{{$item->code}}-just" role="tab" aria-controls="{{$item->code}}-just" aria-selected="true">
                        {{$item->title}}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content pt-1 col-12">
            @foreach($data['languages'] as $item)
                <div class="tab-pane{{ $loop->first ? ' active' : '' }}" id="{{$item->code}}-just" role="tabpanel" aria-labelledby="{{$item->code}}-tab-justified">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" id="title_{{$item->id}}" class="form-control" name="languages[{{$item->id}}][title]" value="{{ old('languages.'.$item->id.'.title') }}">
                                    <label for="title_{{$item->id}}">عنوان ({{$item->title}})</label>
                                </div>
                                @include('post::components.validationError', ['data' => 'languages.*.title'])
                            </div>

                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" id="summary_{{$item->id}}" class="form-control" name="languages[{{$item->id}}][summary]" value="{{ old('languages.'.$item->id.'.summary') }}">
                                    <label for="summary_{{$item->id}}">خلاصه خبر ({{$item->title}})</label>
                                </div>
                                @include('post::components.validationError', ['data' => 'languages.*.summary'])
                            </div>

                            <div class="col-12">
                                <div class="form-label-group">
                                    <textarea id="content_{{$item->id}}" class="form-control" name="languages[{{$item->id}}][content]">{{ old('languages.'.$item->id.'.content') }}</textarea>
                                    <label for="content_{{$item->id}}">توضیحات ({{$item->title}})</label>
                                </div>
                                @include('post::components.validationError', ['data' => 'languages.*.content'])
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="languages[{{$item->id}}][language_id]" value="{{$item->id}}">
            @endforeach
        </div>

        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
            <button id="" type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                ذخیره تغییرات
            </button>
        </div>
    </div>
</div>
