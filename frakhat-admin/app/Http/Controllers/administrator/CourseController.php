<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\CourseCategory;
use App\Services\Uploader\ImageUploader;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Modules\Category\Database\Models\Category;
use Modules\Category\Database\Models\CategoryTranslation;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('manager')){
            $courses = course::all();

            return view('admin.course.couser_list', compact('courses'));
        }else{
            return  view('errors.403');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('manager')){
            $categories = CourseCategory::select('*')->get();

            return view('admin.course.course_create',compact('categories'));
        }else{
            return  view('errors.403');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title_course = $request->input('course_title');
        $filePictureAuthor="";
        $image_author = $request->image_author;
        if ($image_author) {
            $name = ImageUploader::upload(request()->file('image_author'), 'course/images/author/', null, 800, 600, true);
            $filePictureAuthor = $name;
        }


        $filePicture = '';
        $thumbnail_course = $request->course_thumbnail;
        if ($thumbnail_course) {
            $image = ImageUploader::upload(request()->file('course_thumbnail'), 'course/images/course_thumbnail/', null, 800, 600, true);
            $filePicture = $image;
        }


        $fileback_season="";
        $sesason_back = $request->sesason_back;
        if ($sesason_back) {
            $name = ImageUploader::upload(request()->file('sesason_back'), 'course/images/sesason_back/', null, 800, 600, true);
            $fileback_season = $name;
        }


        $filePicture2="";
        $thumbnail2_course = $request->course_thumbnail2;
        if ($thumbnail2_course) {
            $name = ImageUploader::upload(request()->file('course_thumbnail2'), 'course/images/course_thumbnail2/', null, 800, 600, true);
            $filePicture2 = $name;
        }


        $description_course = $request->input('course_content');
        $period_time_course = $request->input('course_time');
        $price_course = $request->input('course_price');
        $description_author = $request->input('description_author');
        $excerpt_course = $request->input('excerpt_course');


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
            'course_category_id' => $request->category_id,
            'spotPlayerID' => $request->spotPlayerID,
            'type' => $request->type,
            'user_id' => auth()->id(),
        ]);



        return redirect()->back();
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
        if (Auth::user()->hasRole('manager')) {
            $course = course::where('id', $id)->first();
            $categories = CourseCategory::select('*')->get();
            return view('admin.course.couser_edit', compact('course', 'categories'));
        } else {
            return view('errors.403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

            Storage::delete($fileChekc->thumbnail_course);
            $image = ImageUploader::upload(request()->file('course_thumbnail'), 'course/images/course_thumbnail', null, 800, 600, true);
            $filePicture = $image;
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
        $spotPlayerID = $request->input('spotPlayerID');
        $type = $request->input('type');


        $new_data = [
            'title_course' => $title_course,
            'description_author' => $description_author,
            'slug' => $this->str_slug_persian($title_course),
            'description_course' => $description_course,
            'period_time_course' => $period_time_course,
            'price_course' => $price_course,
            'excerpt_course' => $excerpt_course,
            'course_category_id' => $category_id,
            'spotPlayerID' => $spotPlayerID,
            'type' => $type,

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

        course::where('id', $id)->update($new_data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileChekc = course::where('id', $id)->first();

        if (!empty($fileChekc->thumbnail_course)){
            unlink(public_path($fileChekc->thumbnail_course));
        }
        if (!empty($fileChekc->thumbnail2_course)){
            unlink(public_path($fileChekc->thumbnail2_course));
        }
        if (!empty($fileChekc->image_author)){
            unlink(public_path($fileChekc->image_author));
        }
        if (!empty($fileChekc->background_season)){
            unlink(public_path($fileChekc->background_season));
        }

        course::where('id', $id)->delete();

        return redirect()->back();
    }
}
