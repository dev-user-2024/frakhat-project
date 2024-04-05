@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('categoryUser_list') }}--}}
@endsection
@section('title')
    لیست سطح دسترسی دسته بندی
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('categoryUser.create')}}">افزودن  دسترسی </a>
@endsection
@section('script')
    @include('common.datatableAndAlertScript')
@endsection
@section('csspanel')
    @include('categoryUser::components.css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست سطح دسترسی دسته بندی
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
                                    <th>کاربر</th>
                                    <th>ایمیل</th>
                                    <th>دسته بندیها</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['categoryUsers'] as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{ $item->full_name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>

                                                @foreach ($item->categoryUsers as $category)
                                                    {{ $category->categoryTranslations->first()->title }} ,
                                                @endforeach

                                            </td>
                                            <td>
                                                <a href="{{route('categoryUser.edit', ['id' => $item->id])}}" style='background: transparent;border: none'>
                                                    <span class='action-edit'>
                                                        <i class='feather icon-edit'></i>
                                                    </span>
                                                </a>
                                                <form id="" class="d-inline deleteForm" action="{{route('categoryUser.delete', ['id' => $item->id])}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button id=""  class="deleteBtn" style='background: transparent;border: none'>
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

