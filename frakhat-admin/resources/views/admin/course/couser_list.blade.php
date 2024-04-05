@extends('layouts.indexpanel')
@section('breadcrumb')
{{--        {{ Breadcrumbs::render('course_list') }}--}}

@endsection
@section('title')
    لیست  دوره
@endsection
@section('button')
    <a class="btn btn-primary" href="{{route('course.create')}}">افزودن  دوره</a>
@endsection
@section('script')
    @include('common.datatableAndAlertScript')
@endsection
@section('csspanel')
    @include('language::components.css')
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        لیست دورها
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
                                    <th>عنوان دوره</th>
                                    <th>شناسه دوره</th>
                                    <th>تصویر شاخص دوره</th>
                                    <th>زمان دوره</th>
                                    <th>مبلغ دوره</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td>{{$course->id}}</td>
                                        <td>{{$course->title_course}}</td>
                                        <td>{{$course->spotPlayerID ?? ''}}</td>
                                        <td>
                                            @if($course->thumbnail_course)
                                                <a href="/{{$course->thumbnail_course}}" target="_blank">
                                                    <img src="{{asset($course->thumbnail_course)}}" style="width: 80px;height: 80px">
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{$course->period_time_course}}</td>
                                        <td>{{$course->price_course}}</td>
                                        <td>
                                            <a href="{{route('course.edit', $id = $course->id)}}" style='background: transparent;border: none'>
                                                    <span class='action-edit'>
                                                        <i class='feather icon-edit'></i>
                                                    </span>
                                            </a>
                                            <form class="d-inline deleteForm" action="{{route('course.destroy', $id = $course->id)}}" method="post">
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

