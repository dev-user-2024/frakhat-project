<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\pages;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class pagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = pages::all();

        return  Response::display($pages);

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
    public function store(\App\Http\Requests\pages $request)
    {
        $validate = Validator::make($request->all(),[
           'page_title'=>'Required',
           'expert_page'=>'Required|min:5|max:50',
           'thumbnail'=>'Required|mimes:jpg',
           'page_content'=>'Required|min:20',
           'slug'=>'Required',
        ]);
        if ($validate->fails()){

            return Response::errors(false,$validate->errors());

        }else{
            $page_title = $request->input('page_title');
            $expert_page = $request->input('expert_page');
            $slug = $request->input('slug');

            $thumbnail = $request->file('thumbnail');
            $name = time() . rand(1, 100) . '.' . $thumbnail->extension();
            $thumbnail->move('image/page/', $name);
            $filePage = $name;

            $page_contentl = $request->input('page_content');
            $date = verta();
            pages::create([
                'title_page'=>$page_title,
                'excerpt_page'=>$expert_page,
                'thumbnail_page'=>$filePage,
                'content_page'=>$page_contentl,
                'slug'=>$slug,
                'date_page'=>$date->format('%Y %B %d'),
            ]);

            return Response::success(true,"با موفقیت ثبت شد");

        }
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
    public function update(\App\Http\Requests\pages $request, $id)
    {
        $fileCheck =  pages::where('id',$id)->first();

            $page_title = $request->input('page_title');
            $expert_page = $request->input('expert_page');

            $thumbnail = $request->file('thumbnail');
            if (isset($thumbnail)){
                if (!empty($fileCheck->thumbnail_page)){
                    unlink('image/page/'.$fileCheck->thumbnail_page);
                }
                $name = time() . rand(1, 100) . '.' . $thumbnail->extension();
                $thumbnail->move('image/page/', $name);
                $filePage = $name;
            }


            $page_contentl = $request->input('page_content');
            pages::where('id',$id)->update(['title_page'=>$page_title]);
            pages::where('id',$id)->update(['excerpt_page'=>$expert_page]);
            if (isset($thumbnail)){
                pages::where('id',$id)->update(['thumbnail_page'=>$filePage]);

            }
            pages::where('id',$id)->update(['content_page'=>$page_contentl]);

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
       $ChekcFile =  pages::where('id',$id)->first();
        unlink('image/page/'.$ChekcFile->thumbnail_page);

        pages::where('id',$id)->delete();

        return Response::success(true,"با موفقیت حذف شد");

    }
}
