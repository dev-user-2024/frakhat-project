@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('userDetail_'.$data['role'].'_list',$data['role']) }}--}}
@endsection
@section('title')
       لیست کاربران {{__('UserDetail::roles.'.$data['role']) ?? ''}}
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('userDetail.create', ['role' => $data['role']])}}">افزودن   {{__('UserDetail::roles.'.$data['role'])}} </a>
@endsection
@section('script')
    @include('common.datatableAndAlertScript')
@endsection
@section('csspanel')
    @include('userDetail::components.css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست کاربران {{__('UserDetail::roles.'.$data['role'])}}
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
                                    <th>نام و نام خانوادگی</th>
                                    <th>شماره همراه</th>
                                    <th> ایمیل</th>
                                    @if($data['role'] == 'reporter')
                                        <th>کدملی</th>
                                        <th>تصویر کارت ملی</th>
                                    @endif
                                    <th>تصویر پروفایل</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['userDetails'] as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->full_name ?? ''}}</td>
                                            <td>{{$item->mobile ?? ''}}</td>
                                            <td>{{$item->email ?? ''}}</td>
                                            @if($data['role'] == 'reporter')
                                                <td>{{$item->userDetail->national_code ?? ''}}</td>
                                                <td>{{$item->userDetail->upload_national_code ?? ''}}</td>
                                            @endif
                                            <td>{{$item->userDetail->image->url ?? ''}}</td>
                                            <td>
                                                @if($data['role'] == 'teacher')
                                                    <a href="{{route('userDetail.info', ['role' => $data['role'], 'id' => $item->id])}}" style='background: transparent;border: none'>
                                                    <span class='action-edit'>
                                                        <i class='feather icon-eye'></i>
                                                    </span>
                                                    </a>
                                                @endif
                                                <a href="{{route('userDetail.edit', ['role' => $data['role'], 'id' => $item->id])}}" style='background: transparent;border: none'>
                                                    <span class='action-edit'>
                                                        <i class='feather icon-edit'></i>
                                                    </span>
                                                </a>
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

