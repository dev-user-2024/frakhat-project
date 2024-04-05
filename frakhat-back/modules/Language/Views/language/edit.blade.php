@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('language_edit',$data['language']->id) }}--}}

@endsection
@section('title')
    ویرایش  زبان
@endsection
@section('script')
    @include('language::components.btnSubmitScript')
@endsection

@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش  زبان  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('language.update', ['id' => $data['language']->id])}}" method="post">
                                @csrf
                                @method('PUT')
                                @include('language::language.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
