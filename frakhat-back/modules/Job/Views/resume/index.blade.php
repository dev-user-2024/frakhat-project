@extends('layouts.indexpanel')

@section('breadcrumb')
    {{-- {{ Breadcrumbs::render('job_list') }} --}}
@endsection

@section('title')
    لیست رزومه‌ها
@endsection

@section('script')
    @include('common.datatableAndAlertScript')
@endsection

@section('csspanel')
    @include('job::components.css')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست رزومه‌ها
                    </div>
                </div>
                <div class="card-body">
                    <section id="basic-datatable">
                        <!-- DataTable starts -->
                        <div class="table-responsive">
                            <table class="table zero-configuration dataTable" id="tblData">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کاربر</th>
                                    <th>موقعیت شغلی</th>
                                    <th>فایل رزومه</th>
                                    <th>وضعیت</th>
{{--                                    <th>تغییر وضعیت</th>--}}
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['resumes'] as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->job->title }}</td>
                                        <td>
                                            @if($item->file)
                                                <a href="/{{$item->file}}" target="_blank">دانلود</a>
                                            @endif
                                        </td>
                                        <td>{{ $item->status }}</td>
{{--                                        <td>--}}
{{--                                            <form action="{{ route('post.approve', $item) }}" method="POST" class="d-inline">--}}
{{--                                                @csrf--}}
{{--                                                @method('PATCH')--}}
{{--                                                <button class="btn btn-sm btn-success" type="submit" {{ $item->status === 'approved' ? 'disabled' : '' }}>تایید</button>--}}
{{--                                            </form>--}}
{{--                                            <form action="{{ route('post.reject', $item) }}" method="POST" class="d-inline">--}}
{{--                                                @csrf--}}
{{--                                                @method('PATCH')--}}
{{--                                                <button class="btn btn-sm btn-danger" type="submit" {{ $item->status === 'rejected' ? 'disabled' : '' }}>رد</button>--}}
{{--                                            </form>--}}
{{--                                        </td>--}}
                                        <td>
                                            <a href="{{ route('resume.edit', ['id' => $item->id]) }}" style="background: transparent; border: none">
                                                <span class="action-edit">
                                                    <i class="feather icon-edit"></i>
                                                </span>
                                            </a>
                                            <form class="d-inline deleteForm" action="{{ route('resume.delete', ['id' => $item->id]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="deleteBtn" style="background: transparent; border: none">
                                                    <span class="action-edit">
                                                        <i class="feather icon-trash"></i>
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
