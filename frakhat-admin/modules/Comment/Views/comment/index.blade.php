@extends('layouts.indexpanel')

@section('breadcrumb')
{{--    {{ Breadcrumbs::render('comment_'.$data['type'].'_list',$data['type']) }}--}}
@endsection

@section('title')
    لیست نظرات
@endsection

@section('script')
    @include('common.datatableAndAlertScript')
@endsection

@section('csspanel')
    @include('comment::components.css')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست نظرات
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
                                    <th>محتوا</th>
                                    <th>تایید شده؟</th>
                                    <th>تاریخ</th>
                                    <th>عملیات</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['comments'] as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->body }}</td>
                                        <td>
                                            <x-comment-status :status="$comment->status" />
                                        </td>
                                        <td>{{ jalali($comment->created_at)->format('Y/m/d') }}</td>
                                        <td>
                                            <form action="{{ route('comment.approve', $comment) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-sm btn-success" type="submit" {{ $comment->status === 'approved' ? 'disabled' : '' }}>تایید</button>
                                            </form>
                                            <form action="{{ route('comment.reject', $comment) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-sm btn-danger" type="submit" {{ $comment->status === 'rejected' ? 'disabled' : '' }}>رد</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form  class="d-inline deleteForm" action="{{route('comment.delete', ['id' => $comment->id])}}" method="post">
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
