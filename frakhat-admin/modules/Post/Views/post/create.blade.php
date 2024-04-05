@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('post_'.$data['type'].'_create',$data['type']) }}--}}
@endsection
@section('title')
    افزودن  پست
@endsection

@section('script')
    @include('post::components.btnSubmitScript')
    @include('post::components.selectTwoScript')
@endsection
@section('csspanel')
    @include('post::components.css')
@endsection

@section('content')
{{--    @if (session('error'))--}}
{{--        <div class="alert alert-danger">--}}
{{--            {{ session('error') }}--}}
{{--        </div>--}}
{{--    @endif--}}
@if (session('error'))
    @php
        $error = is_array(session('error')) ? implode(' ', session('error')) : session('error');
    @endphp
    <div class="alert alert-danger">
        {{ htmlspecialchars($error) }}
    </div>
@endif
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">افزودن پست</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('post::post.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
