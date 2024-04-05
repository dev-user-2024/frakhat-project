@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('userDetail_'.$data['role'].'_edit', $data['userDetail']->id) }}--}}
@endsection
@section('title')
    ویرایش  {{__('UserDetail::roles.'.$data['role'])}}
@endsection
@section('script')
    @include('userDetail::components.btnSubmitScript')
@endsection

@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش  {{__('UserDetail::roles.'.$data['role'])}}  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('userDetail.update', ['id' => $data['userDetail']->id])}}" method="post">
                                @csrf
                                @method('PUT')
                                @include('userDetail::userDetail.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
