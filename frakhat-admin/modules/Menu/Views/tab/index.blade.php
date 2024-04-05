@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('menu_list') }}--}}
@endsection
@section('title')
    لیست  تب ها
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('menu.tab.create')}}">افزودن  تب </a>
@endsection
@section('script')
    @include('common.datatableAndAlertScript')
@endsection
@section('csspanel')
    @include('menu::components.css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست  تب ها
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
                                    <th>نوع</th>
                                    <th>بخش</th>
                                    <th>دسته بندی</th>
                                    <th>موقعیت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['tabs'] as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>{{$item->section->title}}</td>
                                            <td>{{$item->category ? $item->category->categoryTranslations->first()->title : ''}}</td>
                                            <td>{{$item->position}}</td>
                                            <td>
                                                <a href="{{route('menu.tab.edit', ['id' => $item->id])}}" style='background: transparent;border: none'>
                                                    <span class='action-edit'>
                                                        <i class='feather icon-edit'></i>
                                                    </span>
                                                </a>
                                                <form class="d-inline deleteForm" action="{{route('menu.tab.delete', ['id' => $item->id])}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="deleteBtn" style='background: transparent;border: none'>
                                                        <span class='action-edit'>
                                                            <i class='feather icon-trash'></i>
                                                        </span>
                                                    </button>
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

