<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeasoncourseRequest;
use App\Models\course;
use App\Models\season_course;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class seasoncourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courseID = $request->input('course_id');
        $season = season_course::where('course_id',$courseID)->get();

        return  Response::display($season);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeasoncourseRequest $request)
    {
        $courseID = $request->input('course_id');

            $title_season = $request->input('title_season');
            $video_link = $request->input('video_link');
            $status_free = $request->input('status_free');
            $Priority = $request->input('Priority');
            season_course::create([
               'title_season'=>$title_season,
               'video_link'=>$video_link,
               'status_free'=>$status_free,
               'course_id'=>$courseID,
               'Priority'=>$Priority,
            ]);

            return Response::success(true,"با موفقیت ثبت شد");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeasoncourseRequest $request, $id)
    {

            $title_season = $request->input('title_season');
            $video_link = $request->input('video_link');
            $status_free = $request->input('status_free');
            $Priority = $request->input('Priority');

            season_course::where('id',$id)->update(['title_season'=>$title_season]);
            season_course::where('id',$id)->update(['video_link'=>$video_link]);
            season_course::where('id',$id)->update(['status_free'=>$status_free]);
            season_course::where('id',$id)->update(['Priority'=>$Priority]);

            return Response::success(true,"با موفقیت بروزرسانی شد");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        season_course::where('id',$id)->delete();

        return Response::success(true,"با موفقیت حذف شد");


    }
}
