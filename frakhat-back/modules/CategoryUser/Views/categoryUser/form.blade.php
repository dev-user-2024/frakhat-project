<div class="form-body">
    <div class="row">
        <div class="col-12">
            <h6> کاربر</h6>
            <div class="form-label-group">
                <select id="user_id" class="form-control" name="user_id">
                    <option disabled selected>انتخاب کاربر</option>
                    @foreach($data['reporters'] as $user)
                        <option value="{{ $user->id }}" @if(array_key_exists('categoryUser', $data)) {{ $data['categoryUser']->id == $user->id ? 'selected' : '' }}@endif>{{ $user->full_name }}</option>
                    @endforeach
                </select>
            </div>
            @include('categoryUser::components.validationError', ['data' => 'user_id'])
        </div>

        <div class="col-12">
            <h6>دسته بندی</h6>
            <div class="form-label-group">
                <select id="category_id"  class="form-control " multiple name="category_id[]" >
                    <option disabled selected>لطفا دسته بندی را انتخاب نمایید</option>
                    @foreach($data['postCategories'] as $item)
                        <option value="{{ $item->id }}" @if(array_key_exists('categoryUser', $data)) {{ $data['categoryUser']->categoryUsers->contains($item) ? 'selected' : '' }}@endif>
                            {{ $item->categoryTranslations->first()->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            @include('categoryUser::components.validationError', ['data' => 'category_id'])
        </div>

        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
            <button id="" type="submit"  class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                ذخیره تغییرات
            </button>

        </div>
    </div>
</div>
