@extends('layouts.indexpanel')
@section('breadcrumb')
        {{ Breadcrumbs::render('page_edit',$pages->id) }}
@endsection
@section('title')
    ویرایش برگه
@endsection
@section('script')
    <script src="https://cdn.tiny.cloud/1/dzikk7ym099gk68o6a7sxkz550xrm83kgh5shr3nz1uzwqul/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
            toolbar_mode: 'floating',
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
                        <h4 class="card-title">ویرایش برگه </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="categorySave" action="/api/admin/pages/{{ $pages->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" value="{{ $pages->title_page }}" id="first-name-floating" class="form-control" placeholder="عنوان برگه" name="page_title">
                                                <label for="first-name-floating">عنوان برگه</label>
                                            </div>
                                            <p id="pagetitle" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="file" id="first-name-floating" class="form-control" placeholder="تصویر شاخص برگه" name="thumbnail">
                                                <label for="first-name-floating">تصویر شاخص برگه</label>
                                            </div>
                                            <p id="thumbnailPage" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" value="{{ $pages->excerpt_page }}" id="first-name-floating"  class="form-control" placeholder="خلاصه برگه" name="expert_page">
                                                <label for="first-name-floating">خلاصه برگه</label>
                                            </div>
                                            <p id="expertpage" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" value="{{ $pages->slug }}" id="first-name-floating"  class="form-control" placeholder="مسیردستیابی" name="slug">
                                                <label for="first-name-floating">مسیردستیابی</label>
                                            </div>
                                            <p id="slugs" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <textarea name="page_content" class="form-control" id="" cols="30" rows="10">{{ $pages->content_page }}</textarea>
                                                <label for="first-name-floating">محتوا برگه</label>
                                            </div>
                                            <p id="pagecontent" class="text-danger text-right"></p>
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
