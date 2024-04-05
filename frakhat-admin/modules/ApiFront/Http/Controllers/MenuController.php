<?php

namespace Modules\ApiFront\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\course;
use Illuminate\Support\Facades\DB;
use Modules\ApiFront\Http\Resources\CourseMenuResource;
use Modules\ApiFront\Http\Resources\MenuResource;
use Modules\Menu\Database\Models\Menu;

class MenuController extends Controller
{
    public function getMenuList()
    {
        $menus = Menu::with('category')->get();
        return MenuResource::collection($menus);
    }

    public function getCourseMenuList()
    {

        $courseData = DB::table('courses')
            ->select('type', 'id', 'title_course')
            ->orderBy('type')
            ->orderBy('id')
            ->get();

        $result = [];

        foreach ($courseData as $course) {
            $type = $course->type;

            if (!isset($result[$type])) {
                $result[$type] = [];
            }

            $result[$type][] = [
                'id' => $course->id,
                'title_course' => $course->title_course,
            ];
        }

// تغییر نتیجه به آرایه‌ای با کلیدهای مشخص
        $finalResult = [];

        foreach ($result as $type => $courses) {
            $finalResult[] = [
                'type' => $type,
                'courses' => $courses,
            ];
        }

// $finalResult حاوی آرایه‌ای با کلیدهای مشخص و مرتبط با نوع دوره‌ها و داده‌های آنها است

        return response()->json($finalResult);


    }

}
