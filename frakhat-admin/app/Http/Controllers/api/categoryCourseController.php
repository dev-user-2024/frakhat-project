<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCourse;
use App\Models\course_category;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\Category\Database\Models\Category;
use Modules\Category\Database\Models\CategoryTranslation;

class categoryCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = CategoryTranslation::all();

        return  Response::display($course);

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
    public function store(CategoryCourse $request)
    {
        $title = $request->input('category_title');
        $user_id = $request->input('user_id');

        Category::create([
            'user_id' => $user_id,
            'parent_id' => '0',
            'categoryable_type' => $title
        ]);
        $category_id = Category::where('user_id', $user_id)
        ->where('parent_id', 0)
        ->where('categoryable_type', $title)
        ->first();

        CategoryTranslation::create([
            'category_id' => $category_id->id,
            'language_id' => 1,
            'title' => $title,
            'slug' => $title
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
    public function update(CategoryCourse $request, $id)
    {

        $title = $request->input('title');
        CategoryTranslation::where('id', $id)
            ->update([
                'title' => $title,
                'slug' => $this->str_slug_persian($title)
            ]);

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
        $category_id = CategoryTranslation::where('id', $id)->select('category_id')->first();
        Category::where('id',$category_id->category_id)->delete();
        CategoryTranslation::where('id', $id)->delete();

        return Response::success(true,"با موفقیت حذف شد");


    }
}
