@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('adversting_creates') }}--}}

@endsection
@section('title')
    افزودن شرکت
@endsection
@section('script')
    <script>
        $(document).ready(function (e) {
            var token = localStorage.getItem('Token');

            $(document).ajaxStart(function () {
                document.getElementById("btnshow").style.display = "block";
                document.getElementById("btnRequest").style.display = "none";

            }).ajaxStop(function () {
                document.getElementById("btnshow").style.display = "none";
                document.getElementById("btnRequest").style.display = "block";
            });
            $('#VideoSave').on('submit', (function (e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader ("Authorization", "Bearer " + token);
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'موفقیت آمیز',
                            text: "باموفقیت ثبت شد",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'باشه'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href="/admin/video_list"

                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.image_url === undefined) {
                            document.getElementById('imageurl').innerHTML = " "

                        } else {
                            document.getElementById('imageurl').innerHTML = obj.errors.image_url

                        }
                        if (obj.errors.link_url === undefined) {
                            document.getElementById('linkurl').innerHTML = " "

                        } else {
                            document.getElementById('linkurl').innerHTML = obj.errors.link_url

                        }
                        if (obj.errors.posetion_adv === undefined) {
                            document.getElementById('posetionadv').innerHTML = " "

                        } else {
                            document.getElementById('posetionadv').innerHTML = obj.errors.posetion_adv

                        }

                    }
                });
            }));
        });


    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
@section('content')
    @if (session('error'))
        @php
            $error = is_array(session('error')) ? implode(' ', session('error')) : session('error');
        @endphp
        <div class="alert alert-danger">
            {{ htmlspecialchars($error) }}
        </div>
    @endif
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">افزودن شرکت</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('Company.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('admin.Companies.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
