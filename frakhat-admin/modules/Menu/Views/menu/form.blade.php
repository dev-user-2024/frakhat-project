<div class="form-body">
    <div class="row">
{{--        <div class="col-12">--}}
{{--            <div class="form-label-group">--}}
{{--                <input type="text" id="position" class="form-control"  name="position" value="{{ $data['menu']->position ?? old('position') }}">--}}
{{--                <label for="position">الویت منو  </label>--}}
{{--            </div>--}}
{{--            @include('menu::components.validationError', ['data' => 'position'])--}}
{{--        </div>--}}

        <div class="col-12">
            <h6>دسته بندی</h6>
            <div class="form-label-group">
                <select id="category_id"  class="form-control"  name="category_id" >
                    <option disabled>لطفا دسته بندی را انتخاب نمایید</option>
                    @foreach($data['categories'] as $item)
                        <option value="{{ $item->id }}" @if(array_key_exists('post', $data)) {{ $data['post']->categories->contains($item) ? 'selected' : '' }}@endif>
                            {{ $item->categoryTranslations->first()->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('menu::components.validationError', ['data' => 'category_id'])
        </div>
        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
            <button id="" type="submit"  class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                ذخیره تغییرات
            </button>

        </div>
    </div>
</div>
