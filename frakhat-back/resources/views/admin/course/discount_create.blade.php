@extends('layouts.indexpanel')
@section('breadcrumb')
        {{ Breadcrumbs::render('discount_code_create') }}

@endsection
@section('title')
    افزودن کدتخفیف
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
                        if (data.status == true){
                            Swal.fire({
                                title: 'موفقیت آمیز',
                                text: "باموفقیت ثبت شد",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'باشه'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.href = "/admin/discount_code_list"
                                }
                            })
                        }else{
                            Swal.fire({
                                title: 'متاسفم ',
                                text: "کدتخفیف تکراری میباشد",
                                icon: 'warning',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'باشه'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.href = "/admin/discount_code_list"
                                }
                            })
                        }

                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.price === undefined) {
                            document.getElementById('prices').innerHTML = " "

                        } else {
                            document.getElementById('prices').innerHTML = obj.errors.price

                        }
                        if (obj.errors.course_id === undefined) {
                            document.getElementById('courseids').innerHTML = " "

                        } else {
                            document.getElementById('courseids').innerHTML = obj.errors.course_id

                        }
                        if (obj.errors.code === undefined) {
                            document.getElementById('codess').innerHTML = " "

                        } else {
                            document.getElementById('codess').innerHTML = obj.errors.code

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
                        <h4 class="card-title">افزودن کدتخفیف </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="categorySave" action="/api/admin/discount_code" method="post" >
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder="مبلغ کدتخفیف" name="price">
                                                <label for="first-name-floating">مبلغ کدتخفیف</label>
                                            </div>
                                            <p id="prices" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-floating" class="form-control" placeholder=" کدتخفیف" name="code">
                                                <label for="first-name-floating"> کدتخفیف</label>
                                            </div>
                                            <p id="codess" class="text-danger text-right"></p>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <select name="course_id[]" multiple class="form-control js-example-basic-single" id="">
                                                    @foreach($course as $couses)
                                                    <option value="{{ $couses->id }}">{{ $couses->title_course }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="first-name-floating"> محصولات</label>
                                            </div>
                                            <p id="courseids" class="text-danger text-right"></p>
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
