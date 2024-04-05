<div class="form-body">
    <div class="row">
        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="title" class="form-control"  name="title" value="{{ $data['banner']->title ?? old('title') }}">
                <label for="title">عنوان  </label>
            </div>
            @include('banner::components.validationError', ['data' => 'title'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <textarea id="description" class="form-control"  name="description"> {{ $data['banner']->description ?? '' }}</textarea>
                <label for="description">توضیحات  </label>
            </div>
            @include('banner::components.validationError', ['data' => 'description'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <h6>کد تخفیف</h6>
                <select id="discount_id" class="form-control" name="discount_id">
                    <option disabled selected>لطفا   کد تخفیف را انتخاب نمایید</option>
                    @foreach($data['discount'] as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->code ?? '' }}-> ({{ $item->discountMarketer->percent ?? '' }}درصد)
                        </option>
                    @endforeach
                </select>
                <label for="discount_id"> کد تخفیف </label>
            </div>
            @include('banner::components.validationError', ['data' => 'discount_id'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="file" id="logo" class="form-control" name="logo">
                <label for="logo">
                        لوگو
                </label>
            </div>
            @include('banner::components.validationError', ['data' => 'logo'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="file" id="image" class="form-control" name="image">
                <label for="image">
                    تصویر
                </label>
            </div>
            @include('banner::components.validationError', ['data' => 'image'])
        </div>



        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
            <button id="" type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                ذخیره تغییرات
            </button>
{{--            <button id="saveChange" type="submit" onclick="changeButtonText()" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">--}}
{{--                ذخیره تغییرات--}}
{{--            </button>--}}

        </div>
    </div>
</div>
