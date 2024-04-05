@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('categoryUser_edit',$data['categoryUser']->id) }}--}}
@endsection
@section('title')
    ویرایش  سطح دسترسی دسته بندی
@endsection
@section('script')
    @include('categoryUser::components.btnSubmitScript')
@endsection

@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش  سطح دسترسی دسته بندی  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('categoryUser.update', ['id' => $data['categoryUser']->id])}}" method="post">
                                @csrf
                                @method('PUT')
                                @include('categoryUser::categoryUser.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
