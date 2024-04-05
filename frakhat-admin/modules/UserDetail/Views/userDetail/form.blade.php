<div class="form-body">
    <div class="row">
        <div class="col-6">
            <div class="form-label-group">
                <input type="text" id="name" class="form-control"  name="name" value="{{ $data['userDetail']->name ?? old('name') }}">
                <label for="name"> نام  </label>
            </div>
            @include('userDetail::components.validationError', ['data' => 'name'])
        </div>

        <div class="col-6">
            <div class="form-label-group">
                <input type="text" id="family" class="form-control"  name="family" value="{{ $data['userDetail']->family ?? old('family') }}">
                <label for="family">  نام خانوادگی </label>
            </div>
            @include('userDetail::components.validationError', ['data' => 'family'])
        </div>

        <div class="col-6">
            <div class="form-label-group">
                <input type="text" id="email" class="form-control"  name="email" value="{{ $data['userDetail']->email ?? old('email') }}">
                <label for="email">  ایمیل </label>
            </div>
            @include('userDetail::components.validationError', ['data' => 'email'])
        </div>

        <div class="col-6">
            <div class="form-label-group">
                <input type="text" id="mobile" class="form-control"  name="mobile" value="{{ $data['userDetail']->mobile ?? old('mobile') }}">
                <label for="mobile">  موبایل </label>
            </div>
            @include('userDetail::components.validationError', ['data' => 'mobile'])
        </div>

        <div class="col-12">
            <div class="form-label-group">
                <input type="text" id="password" class="form-control"  name="password" value="{{old('password') ?? ''}}">
                <label for="password">  پسورد </label>
            </div>
            @include('userDetail::components.validationError', ['data' => 'password'])
        </div>

        <input type="hidden" name="role" value="{{$data['role']}}">
        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
            <button id="" type="submit"  class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                ذخیره تغییرات
            </button>

        </div>
    </div>
</div>
