@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('menu_create') }}--}}
@endsection
@section('title')
    افزودن  منو
@endsection
@section('script')
    @include('menu::components.btnSubmitScript')
    @if(session('success'))
        <script>
            Swal.fire({
                title: 'موفقیت آمیز',
                text: "باموفقیت ثبت شد",
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'باشه'
            }).then(() => {
                window.location.href = '{{ route('menu.index') }}';
            });
        </script>
    @endif
@endsection

@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">افزودن  منو  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="flash alert alert-danger" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p>
                                    شما فقط قادر به انتخاب از دسته بندیهای اخبار متنی برای منو هستید
                                </p>
                                <p>
                                   دقت داشته باشید تمام منو های ایجاد شده توسط شما در منو سایت اصلی نمایش داده میشود
                                </p>
                            </div>

                            <form class="form" action="{{route('menu.store')}}" method="post">
                                @csrf
                                @include('menu::menu.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
