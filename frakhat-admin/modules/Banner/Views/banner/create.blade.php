@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('banner_create') }}--}}
@endsection
@section('title')
    افزودن  بنر
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
                        <h4 class="card-title">افزودن  بنر  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('banner::banner.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
