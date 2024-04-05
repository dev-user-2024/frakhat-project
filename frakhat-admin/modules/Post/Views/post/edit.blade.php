@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('post_'.$data['type'].'_edit',$data['post']->id) }}--}}
@endsection
@section('title')
    ویرایش  پست
@endsection
@section('script')
    @include('post::components.btnSubmitScript')
    @include('post::components.selectTwoScript')
@endsection
@section('csspanel')
    @include('post::components.css')
@endsection
@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش  پست  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('post.update', ['id' => $data['post']->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('post::post.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
