@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('userDetail_'.$data['role'].'_edit', $data['userDetail']->id) }}--}}
@endsection
@section('title')
    جزئیات  {{__('UserDetail::roles.'.$data['role'])}}
@endsection
@section('script')
    @include('userDetail::components.btnSubmitScript')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        جزئیات مدرس
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            شماره کارت :
                            <br>
                            {{ $data['userDetail']->userDetail->card_number ?? ''}}
                        </div>
                        <div class="col-lg-6">
                            شماره شبا :
                            <br>
                            {{ $data['userDetail']->userDetail->shaba_number ?? ''}}
                        </div>
                        <div class="col-lg-6">
                            کدملی :
                            <br>
                            {{ $data['userDetail']->userDetail->national_code ?? ''}}
                        </div>
                        <div class="col-lg-6">
                            اموزش شما :
                            <br>
                            {{ $data['userDetail']->userDetail->type_learn	?? '' }}
                        </div>
                        <div class="col-lg-6">
                            همکاری با فراخط :
                            <br>
                            {{ $data['userDetail']->userDetail->hiring_frakhat ??'' }}
                        </div>
                        <div class="col-lg-6">
                            عضو هیئت علمی :
                            <br>
                            {{ $data['userDetail']->userDetail->University_faculty	 ?? ''}}
                        </div>
                        <div class="col-lg-6">
                            مدرک تحصیلی :
                            <br>
                            {{ $data['userDetail']->userDetail->status_education ?? ''}}
                        </div>
                        <div class="col-lg-6">
                            ادرس :
                            <br>
                            {{ $data['userDetail']->userDetail->address ?? ''}}
                        </div>
                        <div class="col-lg-12">
                            فیش (اب ، برق،گاز،تلفن) :
                            <br>
                            <a href="{{$data['userDetail']->userDetail->fish_water ?? ''}}">دانلود فیش</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="money" placeholder="سهم مدرس به درصد">
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary" onclick="save_data['userDetail']()" type="button">ذخیره سهم مدرس</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
