@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('page_create') }}--}}

@endsection
@section('title')
    افزودن سطح دسترسی خبرنگار
@endsection
@section('csspanel')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });


    </script>
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
            $('#categorySave').on('submit', (function (e) {
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
                    success: function (data) {
                        Swal.fire({
                            title: 'موفقیت آمیز',
                            text: "باموفقیت ثبت شد",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'باشه'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = "/admin/page_list"
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.page_title === undefined) {
                            document.getElementById('pagetitle').innerHTML = " "

                        } else {
                            document.getElementById('pagetitle').innerHTML = obj.errors.page_title

                        }
                        if (obj.errors.expert_page === undefined) {
                            document.getElementById('expertpage').innerHTML = " "

                        } else {
                            document.getElementById('expertpage').innerHTML = obj.errors.expert_page

                        }
                        if (obj.errors.thumbnail === undefined) {
                            document.getElementById('thumbnailPage').innerHTML = " "

                        } else {
                            document.getElementById('thumbnailPage').innerHTML = obj.errors.thumbnail

                        }
                        if (obj.errors.page_content === undefined) {
                            document.getElementById('pagecontent').innerHTML = " "

                        } else {
                            document.getElementById('pagecontent').innerHTML = obj.errors.page_content

                        }
                        if (obj.errors.slug === undefined) {
                            document.getElementById('slugs').innerHTML = " "

                        } else {
                            document.getElementById('slugs').innerHTML = obj.errors.slug

                        }
                    }
                });
            }));
        });


    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
@section('content')
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card" style="height: auto;">
                    <div class="card-header">
                        <h4 class="card-title">افزودن سطح دسترسی خبرنگار </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="categorySave" action="/api/admin/currency_category" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <select name="user_id" class="form-control" id="">
                                                    <option value="">لطفا کاربر را انتخاب نمایید</option>
                                                    @foreach($users as $user)
                                                    <option value="{{ $user->user_id }}">{{ $user->Fname }} {{ $user->Lname }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="first-name-floating">خبرنگار</label>
                                            </div>
                                            <p id="pagetitle" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <select name="category_id" class="form-control js-example-basic-single"  id="">
                                                    <option value="">لطفا دسته بندی را انتخاب نمایید</option>
                                                    @foreach($category as $categoies)
                                                        <option value="{{ $categoies->id }}">{{ $categoies->title_category }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="first-name-floating">تصویر شاخص برگه</label>
                                            </div>
                                            <p id="thumbnailPage" class="text-danger text-right"></p>
                                        </div>


                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit" id="btnRequest" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"> ذخیره تغییرات</button>
                                            <button id="btnshow" class="btn btn-primary" type="button" disabled style="display: none">
                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                منتظر بمانید...
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
