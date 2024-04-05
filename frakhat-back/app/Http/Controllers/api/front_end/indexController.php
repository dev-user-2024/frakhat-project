<?php

namespace App\Http\Controllers\api\front_end;

use App\Http\Controllers\Controller;
use App\Http\Requests\teacherprofileRequest;
use App\Models\adversting;
use App\Models\course;
use App\Models\menu;
use App\Models\pages;
use App\Models\social_media;
use App\Models\teacher_profile;
use App\Models\User;
use App\Models\Viedo;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//asiye
class indexController extends Controller
{

    public function video_list(){
        $videos = viedo::select('title_video','link_video','video_cover')->get();

        return  Response::display($videos);

    }
    public function adverting_sidebar(){
        $adverstingSidebar = adversting::where('posetion_adv','=','sidebar')->get();

        return  Response::display($adverstingSidebar);

    }

    public function adverting_sectionOne(){
        $adverstingSidebar = adversting::where('posetion_adv','=','section1')->get();

        return  Response::display($adverstingSidebar);

    }
    public function adverting_sectionTwo(){
        $adverstingSidebar = adversting::where('posetion_adv','=','section2')->get();

        return  Response::display($adverstingSidebar);

    }

    public function payment_gateway(Request $request,$id){
//        $user = $request->user();
        $cart_id = $request->cart_id;
        $user = User::find($id);
        $url = '/payment_gateway?id='.$cart_id.'&user_id='.$user->id."&code=";
        return  Response::display($url);
    }
    public function single_page($slug){
        $pages = pages::where('slug',$slug)->get();
        return  Response::display($pages);

    }
    public function social_media_list_homepage(){
        $socials = social_media::all();
        return  Response::display($socials);

    }
    public function menu_list(){
        $socials = menu::orderBy('Priority_menu','DESC')->get();
        return  Response::display($socials);

    }

    public function teacher_register(teacherprofileRequest $request){
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $phone_number = $request->input('phone_number');
        $email = $request->input('email');
        $users = User::create([
            'email'=>$email,
            'password'=>Hash::make('123456'),
            'role'=>'teacher',
        ]);

         teacher_profile::create([
            'Fname'=>$fname,
            'Lname'=>$lname,
            'phone_number'=>$phone_number,
            'user_id'=>$users->id,
        ]);
        return Response::success(true,"با موفقیت ثبت شد");



    }
    public function homepage_website(Request $request){
        $code = $request->input('code');


        return redirect()->to('http://127.0.0.1:8000?code_marketing='.$code);
    }

    //Courses

//    public function course_list(){
//        $courses = course::latest()->select('id','title_course','slug','description_course','background_season','thumbnail_course','thumbnail2_course','excerpt_course')->get();
//        return  Response::display($courses);
//
//    }
//    public function course_list(){
//        $courses = course::latest()->select('id','title_course','slug','description_course','background_season','thumbnail_course','thumbnail2_course','excerpt_course')->get();
//        return  Response::display(new CourseCollection(course::all()));
//    }
///////////////////////////////////
    public function course_list_new(){
        $courses = course::latest()->get();
        return  Response::display($courses);

    }
    public function single_course_new($id){
        $course = course::where('id',$id)->first();
        return  Response::display($course);
    }
////////////////////////////
    public function single_course($slug){
        $course = course::where('slug',$slug)->first();

        return  Response::display($course);
    }
    public function banner_course(){
        $course = course::where('state_banner',1)->get();

        return  Response::display($course);

    }
}
