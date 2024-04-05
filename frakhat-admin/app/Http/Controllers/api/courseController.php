<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\courseRequest;
use App\Models\course;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\Category\Database\Models\Category;
use Modules\Category\Database\Models\CategoryTranslation;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Category::join('courses', 'categories.id', 'courses.category_id' )
            ->join('category_translations', 'category_translations.category_id', 'categories.id')
            ->select('courses.title_course', 'courses.slug', 'courses.thumbnail_course', 'courses.description_course',
                'courses.excerpt_course', 'courses.thumbnail2_course', 'courses.period_time_course', 'courses.price_course',
                'category_translations.title', 'category_translations.slug')
            ->get();

        return Response::display($course);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(courseRequest $request)
    {

        $title_course = $request->input('course_title');
        $filePictureAuthor="";
        $image_author = $request->image_author;
        if ($image_author) {
            $name = time() . rand(1, 100) . '.' . $image_author->extension();
            $image_author->move('image/course/author/', $name);
            $filePictureAuthor = $name;
        }


        $filePicture = '';
        $thumbnail_course = $request->course_thumbnail;
        if ($thumbnail_course) {
            $name = time() . rand(1, 100) . '.' . $thumbnail_course->extension();
            $thumbnail_course->move('image/course/original/', $name);
            $filePicture = $name;
        }


        $fileback_season="";
        $sesason_back = $request->sesason_back;
        if ($sesason_back) {
            $name = time() . rand(1, 100) . '.' . $sesason_back->extension();
            $sesason_back->move('image/course/back_season/', $name);
            $fileback_season = $name;
        }


        $filePicture2="";
        $thumbnail2_course = $request->course_thumbnail2;
        if ($thumbnail2_course) {
            $name = time() . rand(1, 100) . '.' . $thumbnail2_course->extension();
            $thumbnail2_course->move('image/course/original/', $name);
            $filePicture2 = $name;
        }


        $description_course = $request->input('course_content');
        $period_time_course = $request->input('course_time');
        $price_course = $request->input('course_price');
        $description_author = $request->input('description_author');
        $excerpt_course = $request->input('excerpt_course');




//        $category_id = $request->input('category_id');

//        $user_id = 1;

//        Category::create([
//            'user_id' => $user_id,
//            'categoryable_type' => $category_title
//        ]);
//        $id = Category::where('categoryable_type' , $category_title)
//            ->where('user_id' , $user_id)
//            ->select('id')->first();

        course::create([
            'title_course' => $title_course,
            'slug' => $this->str_slug_persian($title_course),
            'thumbnail_course' => $filePicture,
            'thumbnail2_course' => $filePicture2,
            'description_course' => $description_course,
            'period_time_course' => $period_time_course,
            'price_course' => $price_course,

            'season_back' => $fileback_season,
            'image_author' => $filePictureAuthor,
            'description_author' => $description_author,
            'excerpt_course' => $excerpt_course,
        ]);


        return Response::success(true, "با موفقیت ثبت شد");

//        CategoryTranslation::create([
//            'category_id' => $category_id ,
//            'language_id' => 1,
//            'title_course' => $category_title,
//            'slug' => $category_slug
//        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(courseRequest $request, $id)
    {

        $fileChekc = course::where('id', $id)->first();

        $title_course = $request->input('course_title');
        $image_author = $request->file('image_author');
        if (isset($image_author)) {
            if (!empty($fileChekc->image_author)) {
                unlink('image/course/author/' . $fileChekc->image_author);
            }
            $name = time() . rand(1, 100) . '.' . $image_author->extension();
            $image_author->move('image/course/author/', $name);
            $filePictureAuthor = $name;
        }
        $thumbnail_course = $request->file('course_thumbnail');
        if (isset($thumbnail_course)) {
            if (!empty($fileChekc->thumbnail_course)) {
                unlink('image/course/original/' . $fileChekc->thumbnail_course);
            }
            $name = time() . rand(1, 100) . '.' . $thumbnail_course->extension();
            $thumbnail_course->move('image/course/original/', $name);
            $filePicture = $name;
        }
        $sesason_back = $request->file('season_back');

        if (isset($sesason_back)) {
            if (!empty($fileChekc->background_season)) {
                unlink('image/course/back_season/' . $fileChekc->background_season);
            }
            $name = time() . rand(1, 100) . '.' . $sesason_back->extension();
            $sesason_back->move('image/course/back_season/', $name);
            $fileback_season = $name;
        }


        $thumbnail2_course = $request->file('course_thumbnail2');
        if (isset($thumbnail2_course)) {
            if (!empty($fileChekc->thumbnail2_course)) {
                unlink('image/course/original/' . $fileChekc->thumbnail2_course);
            }
            $name = time() . rand(1, 100) . '.' . $thumbnail2_course->extension();
            $thumbnail2_course->move('image/course/original/', $name);
            $filePicture2 = $name;
        }

        $description_course = $request->input('course_content');
        $period_time_course = $request->input('course_time');
        $price_course = $request->input('course_price');
        $description_author = $request->input('description_author');
        $excerpt_course = $request->input('excerpt_course');
        $category_id = $request->input('category_id');

        $new_data = [
            'title_course' => $title_course,
            'description_author' => $description_author,
            'slug' => $this->str_slug_persian($title_course),
            'description_course' => $description_course,
            'period_time_course' => $period_time_course,
            'price_course' => $price_course,
            'excerpt_course' => $excerpt_course,
            'category_id' => $category_id,

        ];

        if (isset($thumbnail_course)) {
            $new_data = array_merge($new_data, ['thumbnail_course' => $filePicture]);

            // course::where('id',$id)->update(['thumbnail_course'=>$filePicture]);

        }

        if (isset($sesason_back)) {
            $new_data = array_merge($new_data, ['background_season' => $fileback_season]);
            // course::where('id',$id)->update(['background_season'=>$fileback_season]);

        }

        if (isset($thumbnail2_course)) {
            $new_data = array_merge($new_data, ['thumbnail2_course' => $filePicture2]);
            // course::where('id',$id)->update(['thumbnail2_course'=>$filePicture2]);

        }
        // course::where('id',$id)->update(['title_course'=>$title_course]);
        // course::where('id',$id)->update(['description_course'=>$description_course]);
        // course::where('id',$id)->update(['period_time_course'=>$period_time_course]);
        // course::where('id',$id)->update(['price_course'=>$price_course]);
        //   if (isset($image_author)){

        // course::where('id',$id)->update(['image_author'=>$filePictureAuthor]);
        //   }

        // course::where('id',$id)->update(['description_author'=>$description_author]);
        // course::where('id',$id)->update(['price_course'=>$price_course]);

        // why did you choose the hard way? -_-
        // ...
        // Now make sense (^_^)
        course::where('id', $id)->update($new_data);

        return Response::success(true, "با موفقیت بروزرسانی شد");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileChekc = course::where('id', $id)->first();

        if (!empty($fileChekc->thumbnail_course)){
            unlink(public_path('image/course/original/'.$fileChekc->thumbnail_course));
        }
        if (!empty($fileChekc->thumbnail2_course)){
            unlink(public_path('image/course/original/'.$fileChekc->thumbnail2_course));
        }
        if (!empty($fileChekc->image_author)){
            unlink(public_path('image/course/author/'.$fileChekc->image_author));
        }
        if (!empty($fileChekc->background_season)){
            unlink(public_path('image/course/back_season/' . $fileChekc->background_season));
        }

        course::where('id', $id)->delete();

        return Response::success(true, "با موفقیت حذف شد");

    }
}
