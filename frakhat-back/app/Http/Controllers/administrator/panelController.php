<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Models\admin_profiles;
use App\Models\adversting;
use App\Models\course;
use App\Models\course_category;
use App\Models\course_teacher;
use App\Models\discount_code_course;
use App\Models\marketer_profile;
use App\Models\marketing_link;
use App\Models\markting_pay;
use App\Models\orders;
use App\Models\pages;
use App\Models\reporter_profile;
use App\Models\season_course;
use App\Models\setting_website;
use App\Models\social_media;
use App\Models\teacher_profile;
use App\Models\trachonesh;
use App\Models\User;
use App\Models\user_profile;
use App\Models\Viedo;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Modules\Category\Database\Models\Category;
use Modules\Category\Database\Models\CategoryTranslation;

class panelController extends Controller
{


    public function panel(Request $request)
    {
//        $userCount = User::where('role','=','user')->count();
//        $admin = User::where('role','=','admin')->count();
//
//
//        $teacher_course = course_teacher::where('user_id',auth()->user()->id)->get();
//
//        $money_marketing = markting_pay::join('discounts','discounts.id','=','markting_pays.discount_id')
//            ->where('markting_pays.user_id',auth::user()->id)->sum('markting_pays.money');
//        $course = course::count();
//        $markting = marketing_link::join('courses','courses.id','=','marketing_links.course_id')->get();
//
//
//        $reporter = User::where('role','=','reporter')->count();
//        $course_users = orders::where('user_id',auth()->user()->id)->count();
//        $trachonesh = trachonesh::where('user_id',auth()->user()->id)->sum('money');
//        return view('admin.panel',compact('userCount','course_users','trachonesh','admin','reporter','teacher_course', 'money_marketing', 'markting', 'course'));
        return view('admin.panel');
    }
    public function admin_profile(Request $request){
        if (Auth::user()->hasRole('manager')){
            $admin_profile = admin_profiles::where('user_id',auth::user()->id)->first();
            return view('admin.profile.admin_profile',compact('admin_profile'));

        }else{
            return  view('errors.403');
        }
    }
    public function reporter_profile(){
        $reporter_profile = reporter_profile::where('user_id',auth::user()->id)->first();
        return view('admin.profile.reporter_profile',compact('reporter_profile'));
    }
    public function change_password(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $password=$request->input('new_password');
        DB::table('users')->where('id','=',auth::user()->id)->update(['password'=>Hash::make($password)]);
       return response()->json([
           'status'=>true,
           'message'=>'باموفقیت بروزرسانی شد'
       ]);
    }
    public function reporter_list(Request $request){
        if (Auth::user()->hasRole('manager')){
            return view('admin.users.reporter_list');
        }else{
            return  view('errors.403');
        }
    }
    public function admin_list(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.users.admin_list');
        }else{
            return  view('errors.403');
        }
    }
    public function user_create(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.users.create_user');
        }else{
            return  view('errors.403');
        }
    }
    public function user_list(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.users.user_list');
        }else{
            return  view('errors.403');
        }
    }
    public function contactUs(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.setting.contactus');
        }else{
            return  view('errors.403');
        }
    }
    public function setting_list(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.setting.setting_list');
        }else{
            return  view('errors.403');
        }
    }
    public function setting_edit($id){
        if (Auth::user()->hasRole('manager')){
            $setting = setting_website::where('id',$id)->first();
            return view('admin.setting.setting_edit',compact('setting'));
        }else{
            return  view('errors.403');
        }
    }
    public function social_list(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.setting.social_list');
        }else{
            return  view('errors.403');
        }
    }
    public function social_edit($id){
        if (Auth::user()->hasRole('manager')){
            $social = social_media::where('id',$id)->first();
            return view('admin.setting.social_edit',compact('social'));
        }else{
            return  view('errors.403');
        }
    }

    public function page_create(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.page.page_create');
        }else{
            return  view('errors.403');
        }
    }
    public function page_list(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.page.page_list');
        }else{
            return  view('errors.403');
        }
    }
    public function page_edit($id){
        if (Auth::user()->hasRole('manager')){
            $pages = pages::where('id',$id)->first();
            return view('admin.page.page_edit',compact('pages'));
        }else{
            return  view('errors.403');
        }
    }

    public function video_create(){
        if (Auth::user()->hasRole('reporter')){
            return view('admin.video.create');
        }else{
            return  view('errors.403');
        }
    }
    public function video_list(){
        if (Auth::user()->hasRole('reporter')){
            return view('admin.video.list');
        }else{
            return  view('errors.403');
        }
    }
    public function video_edit($id){
        if (Auth::user()->hasRole('reporter')){
            $video = Viedo::where('id',$id)->first();
            return view('admin.video.edit',compact('video'));

        }else{
            return  view('errors.403');
        }
    }
    public function adverting_create(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.adversting.create');

        }else{
            return  view('errors.403');
        }
    }
    public function adverting_list(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.adversting.list');

        }else{
            return  view('errors.403');
        }
    }
    public function adverting_edit($id){
        if (Auth::user()->hasRole('manager')){
            $adversting = adversting::where('id',$id)->first();
            return view('admin.adversting.edit',compact('adversting'));
        }else{
            return  view('errors.403');
        }
    }

    public function login_id($user_id){
        $user=User::Find($user_id);
        Auth()->user()->impersonate($user);
        return response()->json([
            'status'=>true,
            'message'=>'وارد شدید'
        ]);
    }
    public function impersonateleave_st(){
        Auth::user()->leaveImpersonation();
        return redirect()->to( url('/admin/dashboard'));

    }
    public function user_profile(){
        $user = user_profile::where('user_id',auth()->user()->id)->first();
        return view('admin.profile.user_profile',compact('user'));
    }
    public function marketer_profile(){
        $marketer = marketer_profile::where('user_id',auth()->user()->id)->first();
        return view('admin.profile.marketer_profile',compact('marketer'));
    }
    public function trachonesh_user_list(){
        if (Auth::user()->hasRole('user')){
            return view('admin.users.trachoneshUser');

        }else{
            return  view('errors.403');
        }
    }
    public function order_user_list(){
        if (Auth::user()->hasRole('user')){
            return view('admin.users.order');

        }else{
            return  view('errors.403');
        }
    }
    public function order_detail($id){
        if (Auth::user()->hasRole('user')){
            $season = season_course::where('course_id',$id)->get();
            return view('admin.users.detail_order',compact('id', 'season'));


        }else{
            return  view('errors.403');
        }
    }
    public function trachonesh_admin_list(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.trachoneshAdmin');

        }else{
            return  view('errors.403');
        }
    }

    public function menu_create(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.setting.menu_create');

        }else{
            return  view('errors.403');
        }
    }
    public function menu_list(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.setting.menu_list');

        }else{
            return  view('errors.403');
        }
    }
    public function marketer_list(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.users.marketer');

        }else{
            return  view('errors.403');
        }
    }
    public function banner_create(){
        if (Auth::user()->hasRole('marketer')){
            return view('admin.marketer.banners');

        }else{
            return  view('errors.403');
        }
    }
    public function teacher_profile(){
        if (Auth::user()->hasRole('teacher')){
            $teacher = teacher_profile::where('user_id',auth::user()->id)->first();
            return view('admin.profile.teacher_profile',compact('teacher'));

        }else{
            return  view('errors.403');
        }
    }
    public function teacher_list(){
        if (Auth::user()->hasRole('manager')){
            return view('admin.users.teacher_list');

        }else{
            return  view('errors.403');
        }
    }
    public function teacher_info($id){
        if (Auth::user()->hasRole('manager')){
            $teacher = teacher_profile::where('user_id',$id)->first();
            return view('admin.users.teacher_info',compact('teacher'));

        }else{
            return  view('errors.403');
        }
    }

    //Courses

    public function discount_code_create(){
        if (Auth::user()->hasRole('manager') xor  Auth::user()->hasRole('marketer')){
            $course = course::all();
            return view('admin.course.discount_create',compact('course'));
        }else{
            return  view('errors.403');
        }
    }
    public function discount_code_list(){
        if (Auth::user()->hasRole('manager') xor  Auth::user()->hasRole('marketer')){
            return view('admin.course.discount_list');
        }else{
            return  view('errors.403');
        }

    }
    public function discount_code_edit($id){
        if (Auth::user()->hasRole('manager') xor  Auth::user()->hasRole('marketer')){
            $discount = discount_code_course::where('id',$id)->first();
            $course = course::all();
            return view('admin.course.discount_edit',compact('discount','course'));
        }else{
            return  view('errors.403');
        }

    }
    public function season_course_list($id){
        if (Auth::user()->hasRole('manager')){
            return  view('admin.course.season_list',compact('id'));
        }else{
            return  view('errors.403');
        }

    }
    public function season_create(){
        if (Auth::user()->hasRole('manager')){
            $course = course::all();
            return  view('admin.course.season_create',compact('course'));
        }else{
            return  view('errors.403');
        }

    }
    public function marketing_discount($id){
        if (Auth::user()->hasRole('marketer') xor Auth::user()->hasRole('manager')){
            return view('admin.course.buy_discount',compact('id'));

        }else{
            return  view('errors.403');
        }
    }
    public function teacher_courses(){
        return view('admin.course.teacher_course');
    }
    public function discount_admin(){
        return view('admin.course.discound_teacher');
    }

}







