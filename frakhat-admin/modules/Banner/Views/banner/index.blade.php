@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('banner_list') }}--}}
@endsection
@section('title')
    لیست  بنر ها
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('banner.create')}}">افزودن  بنر </a>
@endsection
@section('script')
    @include('common.datatableAndAlertScript')
@endsection
@section('csspanel')
    @include('banner::components.css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست  بنر ها
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
                                    <th>توضیحات</th>
                                    <th>کاربر</th>
                                    <th>لوگو</th>
                                    <th>تصویر</th>
                                    <th>کد تخفیف</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['banners'] as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->title ?? ''}}</td>
                                            <td>{{$item->description ?? ''}}</td>
                                            <td>{{$item->user->full_name ?? ''}}</td>
                                            <td>
                                                @if($item->logo)
                                                    <a href="/{{$item->logo}}" target="_blank">
                                                        <img src="{{asset($item->logo)}}" style="width: 80px;height: 80px">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->image)
                                                    <a href="/{{$item->image}}" target="_blank">
                                                        <img src="{{asset($item->image)}}" style="width: 80px;height: 80px">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{$item->discount_id}}</td>
                                            <td>
                                                <a href="{{route('banner.edit', ['id' => $item->id])}}" style='background: transparent;border: none'>
                                                    <span class='action-edit'>
                                                        <i class='feather icon-edit'></i>
                                                    </span>
                                                </a>
                                                <form class="d-inline deleteForm" action="{{route('banner.delete', ['id' => $item->id])}}" method="post">
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

