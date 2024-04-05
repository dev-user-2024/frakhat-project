<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdverstingRequset;
use App\Models\adversting;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class adverstingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adv = adversting::all();

        return  Response::display($adv);

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
    public function store(AdverstingRequset $request)
    {

            $image_url = $request->input('image_url');
            $link_url = $request->input('link_url');
            $posetion_adv = $request->input('posetion_adv');
            adversting::create([
                'image_url'=>$image_url,
                'link_url'=>$link_url,
                'posetion_adv'=>$posetion_adv,
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
    public function update(AdverstingRequset $request, $id)
    {

            $image_url = $request->input('image_url');
            $link_url = $request->input('link_url');
            $posetion_adv = $request->input('posetion_adv');
            adversting::where('id',$id)->update(['image_url'=>$image_url]);
            adversting::where('id',$id)->update(['link_url'=>$link_url]);
            adversting::where('id',$id)->update(['posetion_adv'=>$posetion_adv]);

            return Response::success("با موفقیت بروزرسانی شد");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        adversting::where('id',$id)->delete();
        return Response::success(true,"با موفقیت حذف شد");

    }
}
