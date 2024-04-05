@extends('layouts.indexpanel')
@section('breadcrumb')
{{--    {{ Breadcrumbs::render('tag_list') }}--}}
@endsection
@section('title')
    لیست  تگ ها
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('tag.create')}}">افزودن  تگ </a>
@endsection
@section('script')
    @include('common.datatableAndAlertScript')
@endsection
@section('csspanel')
    @include('tag::components.css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست  تگها
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
                                                <th>عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($item->tagTranslations as $value)
                                                <tr>
                                                    <td>{{$value->id}}</td>
                                                    <td>{{$value->title}}</td>
                                                    <td>{{$value->slug}}</td>
                                                    <td>
                                                        <a href="{{route('tag.edit', ['id' => $value->tag_id])}}" style='background: transparent;border: none'>
                                                        <span class='action-edit'>
                                                            <i class='feather icon-edit'></i>
                                                        </span>
                                                        </a>
                                                        <form class="d-inline deleteForm" action="{{route('tag.delete', ['id' => $value->tag_id])}}" method="post">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


