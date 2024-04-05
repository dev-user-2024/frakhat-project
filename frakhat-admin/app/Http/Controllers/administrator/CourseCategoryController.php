<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{

    public function index()
    {
        $categories = CourseCategory::all();
        return view('admin.course.list_category', compact('categories'));

    }

    public function create()
    {

        return view('admin.course.add_category');

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        CourseCategory::create([
            'title' => $request->input('title'),
            'slug' => $this->str_slug_persian($request->input('title')),
        ]);

        return redirect()->back();
    }


    public function edit($id)
    {
        $category_course = CourseCategory::where('id',$id)->first();
        return view('admin.course.edit_category',compact('category_course'));

    }


    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        CourseCategory::where('id', $id)
            ->update([
                'title' => $title,
                'slug' => $this->str_slug_persian($title)
            ]);
        return redirect()->back();
    }


    public function destroy($id)
    {
        CourseCategory::where('id',$id)->delete();
        return redirect()->back();
    }
}
