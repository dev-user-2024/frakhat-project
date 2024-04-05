@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('banner_edit',$data['banner']->id) }}--}}
@endsection
@section('title')
    ویرایش  بنر
@endsection
@section('script')
    @include('banner::components.btnSubmitScript')
@endsection

@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش  بنر  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('banner.update', ['id' => $data['banner']->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('banner::banner.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
