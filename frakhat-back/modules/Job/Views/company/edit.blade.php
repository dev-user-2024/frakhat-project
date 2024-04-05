@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('job_edit',$data['job']->id) }}--}}

@endsection
@section('title')
    ویرایش  شرکت
@endsection
@section('script')
    @include('job::components.btnSubmitScript')
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
                window.location.href = '{{ route('company.index') }}';
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
                        <h4 class="card-title">ویرایش  شرکت  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('company.update', ['id' => $data['company']->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('job::company.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
