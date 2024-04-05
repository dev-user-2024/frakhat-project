@extends('layouts.indexpanel')
@section('breadcrumb')
{{--        {{ Breadcrumbs::render('category_course_list') }}--}}

@endsection
@section('title')
    لیست دسته بندی دوره
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('course_category.create')}}">افزودن دسته بندی دوره</a>
@endsection
@section('script')
    @include('common.datatableAndAlertScript')
@endsection
@section('csspanel')
    @include('language::components.css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست دسته بندی ها
                    </div>
                </div>
                <div class="card-body">
                    <section id="basic-datatable">
                        <!-- DataTable starts -->
                        <div class="table-responsive">
                            <table class="table zero-configuration dataTable " id="tblData">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>اسلاگ</th>
                                    <th>سرگروه</th>
                                    <th>
                                        ویرایش / حذف
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>@if(!is_null($category->parents_id)){{$category->parents_id}}
                                            @else
                                            ندارد
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('course_category.edit', $id = $category->id)}}">
                                                <button style='background: transparent;border: none'><span class='action-edit'><i class='feather icon-edit'></i></span></button>
                                            </a>
                                            <form action="{{route('course_category.destroy', $id = $category->id)}}" method="POST">
                                                @CSRF
                                                @method('DELETE')
                                                <button style='background: transparent;border: none'><span class='action-edit'><i class='feather icon-trash'></i></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- DataTable ends -->
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

