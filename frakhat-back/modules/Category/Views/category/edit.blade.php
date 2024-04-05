@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('category_'.$data['type'].'_edit',$data['category']->id) }}--}}
@endsection
@section('title')
    ویرایش دسته بندی
@endsection
@section('script')
    @include('category::components.btnSubmitScript')
@endsection

@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش دسته بندی  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('category.update', ['id' => $data['category']->id])}}" method="post">
                                @csrf
                                @method('PUT')
                                @include('category::category.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
