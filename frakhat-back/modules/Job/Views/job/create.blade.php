@extends('layouts.indexpanel')
@section('breadcrumb')
    {{--    {{ Breadcrumbs::render('job_create') }}--}}
@endsection
@section('title')
    افزودن  شغل
@endsection
@section('script')
    <style>
        .skill-row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .tags-input {
            flex: 1;
            padding: 5px;
        }

        .remove-skill {
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
            margin-left: 10px;
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-two').select2();
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#add-skill").click(function() {
                var skillRow = `
                <div class="skill-row">
                    <input type="text" name="skills[]" class="tags-input form-control" required>
                    <button type="button" class="remove-skill">❌</button>
                </div>
            `;
                $("#skills-input-container").append(skillRow);
            });

            $(document).on('click', '.remove-skill', function() {
                $(this).parent('.skill-row').remove();
            });
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="flash alert alert-danger" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            @if(is_array(Session::get('error')))
                @foreach(Session::get('error') as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @else
                <p>{{ htmlspecialchars(Session::get('error')) }}</p>
            @endif

        </div>
    @endif
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">افزودن  شفل  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('job.store')}}" method="post">
                                @csrf
                                @include('job::job.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
