@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('adBanner_create') }}--}}
@endsection
@section('title')
    افزودن  اسلایدر
@endsection
@section('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function changeButtonText() {
            // Get the button element
            var button = document.getElementById('saveChange');

            // Change the button text to "Submitting..."
            button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>منتظر بمانید...';

            // Disable the button to prevent multiple submissions
            button.disabled = true;
        }
    </script>
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
                window.location.href = '{{ route('courseBanner.index') }}';
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
                        <h4 class="card-title">افزودن  اسلایدر  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('courseBanner.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('adBanner::courseBanner.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
