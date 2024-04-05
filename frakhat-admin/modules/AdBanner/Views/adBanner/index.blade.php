@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('adBanner_list') }}--}}
@endsection
@section('title')
    لیست بنرهای تبلیغاتی
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('adBanner.create')}}">افزودن  بنر </a>
@endsection
@section('script')
    @include('common.datatableAndAlertScript')
@endsection
@section('csspanel')
    @include('adBanner::components.css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست بنرهای تبلیغاتی
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
                                    <th>موقعیت</th>
                                    <th>تصویر</th>
                                    <th>لینک</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['adBanners'] as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->position ?? ''}}</td>
                                            <td>
                                                @if($item->image)
                                                    <a href="/{{$item->image}}" target="_blank">
                                                        <img src="{{asset($item->image)}}" style="width: 80px;height: 80px">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{$item->link ?? ''}}</td>

                                            <td>
                                                <a href="{{route('adBanner.edit', ['id' => $item->id])}}" style='background: transparent;border: none'>
                                                    <span class='action-edit'>
                                                        <i class='feather icon-edit'></i>
                                                    </span>
                                                </a>
                                                <form class="d-inline deleteForm" action="{{route('adBanner.delete', ['id' => $item->id])}}" method="post">
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

