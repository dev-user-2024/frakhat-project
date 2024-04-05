@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('adBanner_edit',$data['adBanner']->id) }}--}}
@endsection
@section('title')
    ویرایش  اسلایدر
@endsection
@section('script')
    @include('adBanner::components.btnSubmitScript')
@endsection

@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش  اسلایدر  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('courseBanner.update', ['id' => $data['adBanner']->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('adBanner::courseBanner.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
