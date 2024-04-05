@extends('layouts.indexpanel')

@section('breadcrumb')
    {{-- {{ Breadcrumbs::render('job_list') }} --}}
@endsection

@section('title')
    لیست شغل‌ها
@endsection

@section('button')
    <a class="btn btn-primary" href="{{ route('job.create') }}">افزودن شغل جدید</a>
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
                        لیست شغل‌ها
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
                                    <th>عنوان</th>
                                    <th>شرکت</th>
                                    <th>موقعیت مکانی</th>
                                    <th>نوع همکاری</th>
                                    <th>حقوق حداقل</th>
                                    <th>توضیحات</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['jobs'] as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->company->name_fa }}</td>
                                        <td>{{ $item->location }}</td>
                                        <td>{{ $item->employment_type }}</td>
                                        <td>{{ $item->minimum_salary }}</td>
                                        <td>{{ $item->job_description }}</td>
                                        <td>
                                            <a href="{{ route('job.edit', ['id' => $item->id]) }}" style="background: transparent; border: none">
                                                    <span class="action-edit">
                                                        <i class="feather icon-edit"></i>
                                                    </span>
                                            </a>
                                            <form class="d-inline deleteForm" action="{{ route('job.delete', ['id' => $item->id]) }}" method="post">
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
