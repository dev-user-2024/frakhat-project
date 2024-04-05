@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('category_'.$data['type'].'_list',$data['type']) }}--}}
@endsection
@section('title')
    لیست دسته بندی
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('category.create', ['type' => $data['type']])}}">افزودن دسته بندی </a>
@endsection
@section('script')
    @include('common.datatableAndAlertScript')
@endsection
@section('csspanel')
    @include('category::components.css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست دسته بندی
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
                                                <th>عنوان({{$item->title}})</th>
                                                <th>slug({{$item->title}})</th>
                                                <th>سرگروه</th>
                                                <th>عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($item->categoryTranslations as $value)
                                                @if($value->category->categoryable_type == $data['type'])
                                                <tr>
                                                    <td>{{$value->id}}</td>
                                                    <td>{{$value->title}}</td>
                                                    <td>{{$value->slug}}</td>
                                                    <td>
                                                        @if ($value->category->parent_id == 0)
                                                            دسته اصلی
                                                        @else
                                                            {{ $value->category->parent->categoryTranslations->first()->title ?? '' }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('category.edit', ['id' => $value->category_id])}}" style='background: transparent;border: none'>
                                                        <span class='action-edit'>
                                                            <i class='feather icon-edit'></i>
                                                        </span>
                                                        </a>
                                                        <form class="d-inline deleteForm" action="{{route('category.delete', ['id' => $value->category_id])}}" method="post">
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

