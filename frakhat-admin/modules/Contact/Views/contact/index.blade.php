@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('contact_list') }}--}}
@endsection
@section('title')
    لیست  درخواست های مشاوره دوره ها
@endsection

@section('script')
    @include('common.datatableAndAlertScript')
@endsection
@section('csspanel')
    @include('contact::components.css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست  درخواست های مشاوره
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
                                    <th>نام نام خانوادگی</th>
                                    <th>موبایل</th>
                                    <th>شماره ثابت</th>
                                    <th>ایمیل</th>
                                    <th>دوره</th>
                                    <th>توضیحات</th>
                                    <th>تاریخ</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['contacts'] as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->full_name}}</td>
                                            <td>{{$item->mobile}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->course->title_course ?? ''}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->created_at->toJalali()->format('Y/m/d') ?? ''}}</td>
                                            <td>
                                                <form class="d-inline deleteForm" action="{{route('contact.delete', ['id' => $item->id])}}" method="post">
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

