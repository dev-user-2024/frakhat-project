<input type="hidden" name="categoryable_type" value="{{$data['type']}}">
<div class="form-body">
    <div class="row">
        <div class="col-12">
            <div class="form-label-group">
                <select id="parent_id" class="form-control" name="parent_id">
                    <option disabled>لطفا سرگروه دسته را انتخاب نمایید</option>
                    <option value="0" @if (isset($data['category']) && $data['category']->parent_id == 0) {{ 'selected' }} @endif>سرگروه</option>
                    @foreach($data['categories'] as $category)
                        <option value="{{ $category->id }}" @if (isset($data['category']) && $data['category']->parent_id == $category->id) {{ 'selected' }} @endif>
                            {{ $category->categoryTranslations->first()->title ?? '' }}
                        </option>
                    @endforeach
                </select>
                <label for="parent_id">سرگروه دسته بندی </label>
            </div>
            @include('category::components.validationError', ['data' => 'parent_id'])
        </div>



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
                                    <input type="text" id="title_{{$item->id}}" class="form-control"  name="languages[{{$item->id}}][title]" @if(array_key_exists('category', $data)) value="{{ $data['category']->categoryTranslations->where('language_id', $item->id)->first()->title ?? old('title') }}" @endif>
                                    <label for="title_{{$item->id}}"> عنوان({{$item->title}})  </label>
                                </div>
                                @include('tag::components.validationError', ['data' => 'languages.*.title'])
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="languages[{{$item->id}}][language_id]" value="{{$item->id}}">
            @endforeach
        </div>

        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
            <button id="" type="submit"  class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                ذخیره تغییرات
            </button>
        </div>
    </div>
</div>


