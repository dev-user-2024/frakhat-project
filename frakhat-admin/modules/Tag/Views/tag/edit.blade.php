@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('tag_edit',$data['tag']->id) }}--}}

@endsection
@section('title')
    ویرایش  تگ
@endsection
@section('script')
    @include('tag::components.btnSubmitScript')
@endsection

@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش  تگ  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('tag.update', ['id' => $data['tag']->id])}}" method="post">
                                @csrf
                                @method('PUT')
                                @include('tag::tag.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
