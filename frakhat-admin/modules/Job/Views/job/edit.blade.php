@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('job_edit',$data['job']->id) }}--}}

@endsection
@section('title')
    ویرایش  شغل
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-two').select2();
        });
    </script>
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
                window.location.href = '{{ route('job.index') }}';
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
                        <h4 class="card-title">ویرایش  شغل  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('job.update', ['id' => $data['job']->id])}}" method="post">
                                @csrf
                                @method('PUT')
                                @include('job::job.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
