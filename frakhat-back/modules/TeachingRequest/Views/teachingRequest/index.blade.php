@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('teachingRequest_list') }}--}}
@endsection
@section('title')
    لیست درخواست‌های تدریس
@endsection
@section('button')
{{--    <a class="btn btn-primary" href="{{route('teachingRequest.create')}}">ثبت درخواست تدریس</a>--}}
@endsection
@section('script')
    @include('common.datatableAndAlertScript')
@endsection
@section('csspanel')
    @include('teachingRequest::components.css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست درخواست‌های تدریس
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
                                    <th>وضعیت</th>
                                    <th>تغییر وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['teachingRequests'] as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->subject}}</td>
                                        <td>{{$item->message}}</td>
                                        <td>
                                            <x-teachingRequest-status :status="$item->status" />
                                        </td>
                                        <td>
                                            <form action="{{ route('teachingRequest.approve', $item) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-sm btn-success" type="submit" {{ $item->status === 'approved' ? 'disabled' : '' }}>تایید</button>
                                            </form>
                                            <form action="{{ route('teachingRequest.reject', $item) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-sm btn-danger" type="submit" {{ $item->status === 'rejected' ? 'disabled' : '' }}>رد</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form class="d-inline deleteForm" action="{{route('teachingRequest.delete', ['id' => $item->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
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
