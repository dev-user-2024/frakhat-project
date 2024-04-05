@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('categoryUser_create') }}--}}
@endsection
@section('title')
    افزودن  سطح دسترسی دسته بندی
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
                        <h4 class="card-title">افزودن  سطح دسترسی دسته بندی  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('categoryUser.store')}}" method="post">
                                @csrf
                                @include('categoryUser::categoryUser.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
