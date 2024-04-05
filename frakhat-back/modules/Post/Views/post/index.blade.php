@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('post_'.$data['type'].'_list',$data['type']) }}--}}
@endsection
@section('title')
    لیست  پست ها
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('post.create', ['type' => $data['type']])}}">افزودن  پست </a>
@endsection
@section('script')
    @include('common.datatableAndAlertScript')
    <script>
        $(document).ready(function() {
            let selectedPage = localStorage.getItem('selectedPage') || 0; // خواندن شماره صفحه انتخابی از localStorage

            const dataTable = $('.tblData').DataTable({
                "language": {
                    "paginate": {
                        "previous": "قبلی",
                        "next": "بعدی",
                    },
                    "sSearch": "جستجو : "
                },
                "bDestroy": true,
                "order": [],
                "pageLength": 10, // تعداد ردیف‌های نمایش داده شده در هر صفحه
                "displayStart": selectedPage * 10, // شماره ردیف ابتدایی جدول
            });

            // رویداد تغییر صفحه DataTables
            dataTable.on('page.dt', function () {
                selectedPage = dataTable.page(); // ذخیره شماره صفحه جدید
                localStorage.setItem('selectedPage', selectedPage); // ذخیره شماره صفحه انتخابی در localStorage
            });

            // رویداد بارگذاری DataTables بعد از رفرش صفحه
            $(document).on('turbolinks:load', function() {
                dataTable.page(selectedPage).draw('page'); // بازگردانی به صفحه انتخابی
            });
        });

    </script>
@endsection
@section('csspanel')
    @include('post::components.css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست  پست ها
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                        @foreach($data['languages'] as $item)
                            <li class="nav-item">
                                <a class="nav-link{{ $loop->first ? ' active' : '' }}" id="{{$item->code}}-tab-justified" data-toggle="tab" href="#{{$item->code}}-just" role="tab" aria-controls="{{$item->code}}-just" aria-selected="true">
                                    {{$item->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content pt-1">
                        @foreach($data['languages'] as $item)
                            <div class="tab-pane{{ $loop->first ? ' active' : '' }}" id="{{$item->code}}-just" role="tabpanel" aria-labelledby="{{$item->code}}-tab-justified">
                                <section id="basic-datatable">
                                    <!-- DataTable starts -->
                                    <div class="table-responsive">
                                        <table class="table zero-configuration dataTable tblData" id="tblData">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>نویسنده</th>
                                                <th>عنوان({{$item->title}})</th>
                                                <th>slug({{$item->title}})</th>
                                                <th>دسته بندی</th>
                                                <th>تگ</th>
                                                <th>تصویر</th>
                                                <th>وضعیت</th>
                                                <th>تغییر وضعیت</th>
                                                <th>عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($item->postTranslations as $value)
                                                @if($value->post->type == $data['type'])
                                                    <tr>
                                                    <td>{{$value->id}}</td>
                                                    <td>{{$value->post->user->fullName ?? ''}}</td>
                                                    <td>{{$value->title}}</td>
                                                    <td>{{$value->slug}}</td>
                                                    <td>
                                                        @foreach($value->post->categories as $item)
                                                            {{ $item->categoryTranslations->first()->title ?? '' }}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($value->post->tags as $item)
                                                            {{ $item->tagTranslations->first()->title ?? '' }}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if($value->post->image)
                                                            <a href="/{{$value->post->image}}" target="_blank">
                                                                <img src="{{asset($value->post->image)}}" style="width: 80px;height: 80px">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <x-post-status :status="$value->post->status" />
                                                    </td>
                                                        <td>
                                                            <form action="{{ route('post.approve', $value->post) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button class="btn btn-sm btn-success" type="submit" {{ $value->post->status === 'approved' ? 'disabled' : '' }}>تایید</button>
                                                            </form>
                                                            <form action="{{ route('post.reject', $value->post) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button class="btn btn-sm btn-danger" type="submit" {{ $value->post->status === 'rejected' ? 'disabled' : '' }}>رد</button>
                                                            </form>
                                                        </td>
                                                    <td style="white-space: nowrap">
                                                        @if($value->post->type == 'image')
                                                            <a href="#" target="_blank" style='background: transparent;border: none'>
                                                                <span class='action-edit'>
                                                                    <i class='feather icon-eye'></i>
                                                                </span>
                                                            </a>
                                                        @endif
                                                            @if($value->post->type == 'video')

                                                                <a href="/{{$value->post->videos->first()->url}}" target="_blank" style='background: transparent;border: none'>
                                                                    <span class='action-edit'>
                                                                        <i class='feather icon-eye'></i>
                                                                    </span>
                                                                </a>
                                                            @endif
                                                        <a href="{{route('post.edit', ['id' => $value->post_id])}}" style='background: transparent;border: none'>
                                                            <span class='action-edit'>
                                                                <i class='feather icon-edit'></i>
                                                            </span>
                                                        </a>
                                                        <form class="d-inline deleteForm" action="{{route('post.delete', ['id' => $value->post_id])}}" method="post">
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
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- DataTable ends -->
                                </section>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

