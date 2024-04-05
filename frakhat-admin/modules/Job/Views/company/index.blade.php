@extends('layouts.indexpanel')

@section('breadcrumb')
    {{-- {{ Breadcrumbs::render('company_list') }} --}}
@endsection

@section('title')
    لیست شرکت‌ها
@endsection

@section('button')
    <a class="btn btn-primary" href="{{ route('company.create') }}">افزودن شرکت جدید</a>
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
                        لیست شرکت‌ها
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
                                    <th>نام فارسی</th>
                                    <th>نام انگلیسی</th>
                                    <th>سال تاسیس</th>
                                    <th>لوگو</th>
                                    <th>تعداد نفرات</th>
                                    <th>توضیحات</th>
                                    <th>آدرس</th>
                                    <th>حوزه کاری</th>
                                    <th>آدرس وب سایت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['companies'] as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name_fa }}</td>
                                        <td>{{ $item->name_en }}</td>
                                        <td>{{ $item->established_year }}</td>
                                        <td>
                                            @if($item->logo)
                                                <a href="/{{$item->logo}}" target="_blank">
                                                    <img src="{{asset($item->logo)}}" style="width: 80px;height: 80px">
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $item->number_of_persons }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->industry }}</td>
                                        <td>{{ $item->website }}</td>
                                        <td>
                                            <a href="{{ route('company.edit', ['id' => $item->id]) }}" style="background: transparent; border: none">
                                                    <span class="action-edit">
                                                        <i class="feather icon-edit"></i>
                                                    </span>
                                            </a>
                                            <form class="d-inline deleteForm" action="{{ route('company.delete', ['id' => $item->id]) }}" method="post">
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
