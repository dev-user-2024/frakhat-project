<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequset;
use App\Models\Viedo;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Video = Viedo::all();

        return  Response::display($Video);
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
    public function store(VideoRequset $request)
    {

            $cover_vedio = $request->file('cover_vedio');
             if (isset($cover_vedio)){

             $name = time().rand(1,100).'.'.$cover_vedio->extension();
            $cover_vedio->move('image/video/thumb/', $name);
            $fileback_season = $name;
            }

            $title = $request->input('title_video');
            $des = $request->input('description');
            $link = $request->input('link_video');
            Viedo::create([
                'title_video'=>$title,
                'description_video'=>$des,
                'link_video'=>$link,
                'video_cover'=>$fileback_season
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
    public function update(VideoRequset $request, $id)
    {
        $video = Viedo::where('id',$id)->first();
         $cover_vedio = $request->file('cover_vedio');
             if (isset($cover_vedio)){
                  if (!empty($video->video_cover)){
                    unlink('image/video/thumb/'.$cover_vedio->video_cover);
                }
             $name = time().rand(1,100).'.'.$cover_vedio->extension();
            $cover_vedio->move('image/video/thumb/', $name);
            $fileback_season = $name;
            }


            $title = $request->input('title_video');
            $des = $request->input('description');
            $link = $request->input('link_video');
            Viedo::where('id',$id)->update(['title_video'=>$title]);
            Viedo::where('id',$id)->update(['description_video'=>$des]);
            Viedo::where('id',$id)->update(['link_video'=>$link]);
            if (isset($cover_vedio)){
                            Viedo::where('id',$id)->update(['video_cover'=>$fileback_season]);

            }

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
        Viedo::where('id',$id)->delete();
        return Response::success(true,"با موفقیت حذف شد");


    }
}
