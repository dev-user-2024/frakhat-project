@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('tag_create') }}--}}
@endsection
@section('title')
    افزودن  تگ
@endsection
@section('csspanel')
    <link rel="stylesheet" type="text/css" href="{{asset('panelStyle/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">

@endsection
@section('script')
    <script src="{{asset('panelStyle/app-assets/js/scripts/navs/navs.js')}}"></script>
    @include('tag::components.btnSubmitScript')
@endsection

@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">افزودن  تگ  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('tag.store')}}" method="post">
                                @csrf
                                @include('tag::tag.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
