<?php

namespace App\Http\Controllers\api\front_end;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\course;
use App\Models\orders;
use App\Models\trachonesh;
use App\Models\user_profile;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function get_user(Request $request){
        $user = $request->user();
        $user['profile'] = $user->profile;
        return  Response::display($user);
    }

    public function update(Request $request){

        $user = auth()->user();
        $profile = $user->profile;

        $filePicture = $profile->picture;
        $picture  = $request->file('picture');
        if (isset($picture)){
            if (!empty($filePicture)){
                unlink('image/users/profile/'.$profile->picture);
            }
            $name = time().rand(1,100).'.'.$picture->extension();
            $picture->move('image/users/profile/', $name);
            $filePicture = $name;
        }
//        $user->update([
//           'email' => $request->input('email')
//        ]);
        $profile->update([
            'Fname'=>$request->input('firstName'),
            'Lname'=>$request->input('lastName'),
            'picture'=>$filePicture,
            'mobile' => $request->input('mobile'),
            'tell' => $request->input('tell'),
            'code_melli' => $request->input('nationalCode'),
            'city' => $request->input('city'),
            'birth_day' => $request->input('birthDay'),
        ]);
        return Response::success(true,"با موفقیت بروزرسانی شد");
    }

    public function trachonesh_list(){
        $trachonesh = trachonesh::where('user_id',auth()->user()->id)->get();
        return  Response::display($trachonesh);

    }

    //Courses

    public function order_list(){
        $orders = orders::join('courses','courses.id','=','orders.course_id')->where('user_id',auth()->user()->id)->get();
        return  Response::display($orders);

    }
    public function authUserCourses(Request $request){
        $authUserCourses = $request->user()->courses;
        return  Response::display($authUserCourses);
    }

    public function courseSeasons($course_id){
        $course = course::query()->find($course_id);
        return  Response::display($course->seasons);
    }
}
