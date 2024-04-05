<?php

namespace Modules\ApiFront\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\CourseCollection;
use App\Models\course;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    public function searchAllFields(Request $request)
    {
        $keyword = $request->input('keyword');

        $courses = course::where(function ($query) use ($keyword) {
            $query->orWhere('title_course', 'like', "%$keyword%")
                ->orWhere('description_course', 'like', "%$keyword%")
                ->orWhere('slug', 'like', "%$keyword%")
                ->orWhereHas('category', function ($q) use ($keyword) {
                    $q->where('title', 'like', "%$keyword%");
                });
        })->paginate(10);

        return new CourseCollection($courses);
    }
}
