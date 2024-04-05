<ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
    @foreach($data['languages'] as $item)
        <li class="nav-item">
            <a class="nav-link{{ $loop->first ? ' active' : '' }}" id="{{$item->code}}-tab-justified" data-toggle="tab" href="#{{$item->code}}-just" role="tab" aria-controls="{{$item->code}}-just" aria-selected="true">
                {{$item->title}}
            </a>
        </li>
    @endforeach
</ul>
<div class="tab-content pt-1">
    @foreach($data['languages'] as $item)
        <div class="tab-pane{{ $loop->first ? ' active' : '' }}" id="{{$item->code}}-just" role="tabpanel" aria-labelledby="{{$item->code}}-tab-justified">
            <div class="form-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-label-group">
                            <input type="text" id="title_{{$item->id}}" class="form-control"  name="languages[{{$item->id}}][title]" @if(array_key_exists('tag', $data)) value="{{ $data['tag']->tagTranslations->where('language_id', $item->id)->first()->title ?? old('title') }}" @endif>
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
