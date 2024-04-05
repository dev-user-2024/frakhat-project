<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\marketerRequest;
use App\Http\Requests\menuRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\ReporterRequest;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\socialRequest;
use App\Http\Requests\teacherRequest;
use App\Http\Requests\UserRequest;
use App\Models\admin_profiles;
use App\Models\contactus;
use App\Models\course;
use App\Models\course_teacher;
use App\Models\marketer_profile;
use App\Models\markting_pay;
use App\Models\menu;
use App\Models\orders;
use App\Models\reporter_profile;
use App\Models\setting_website;
use App\Models\social_media;
use App\Models\teacher_profile;
use App\Models\Token;
use App\Models\trachonesh;
use App\Models\User;
use App\Models\user_profile;
use App\Rules\Nationalcode;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function Symfony\Component\VarDumper\Dumper\esc;

class apiController extends Controller
{

    public function UpdateReporter(ReporterRequest $request){
        $id = auth()->user()->id;
        $fileCheck  = reporter_profile::where('user_id',$id)->first();

        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $national_code = $request->input('national_code');
        $address = $request->input('address');
        $picture = $request->file('picture');
        if (isset($picture)){
            if (!empty($fileCheck->picture)){
                unlink('image/users/reporters/profile/'.$fileCheck->picture);
            }
            $name = time().rand(1,100).'.'.$picture->extension();
            $picture->move('image/users/reporters/profile/', $name);
            $filePicture = $name;

        }

        $upload_codemili = $request->file('upload_codemili');

        if (isset($upload_codemili)){
            if (empty($fileCheck->upload_national_code)) {
                if (!empty($fileCheck->upload_national_code)) {
                    unlink('image/users/reporters/upload/' . $fileCheck->upload_national_code);
                }
                $name = time() . rand(1, 100) . '.' . $upload_codemili->extension();
                $upload_codemili->move('image/users/reporters/upload/', $name);
                $fileCodemili = $name;
            }
        }

        $phone_number = $request->input('phone_number');


        reporter_profile::where('user_id',$id)->update(['Fname'=>$fname]);
        reporter_profile::where('user_id',$id)->update(['Lname'=>$lname]);
        reporter_profile::where('user_id',$id)->update(['national_code'=>$national_code]);
        reporter_profile::where('user_id',$id)->update(['address'=>$address]);
        reporter_profile::where('user_id',$id)->update(['picture'=>$filePicture]);
        if (empty($fileCheck->upload_national_code)){
            reporter_profile::where('user_id',$id)->update(['upload_national_code'=>$fileCodemili]);

        }
        reporter_profile::where('user_id',$id)->update(['phone_number'=>$phone_number]);

        return Response::success(true,"با موفقیت بروزرسانی شد");

    }
    public function update_admin(AdminRequest $request){
        $id = auth()->user()->id;
        $fileCheck = admin_profiles::where('user_id',$id)->first();

            $picture  = $request->file('picture');
            if (isset($picture)){
                if (!empty($fileCheck->picture)){
                    unlink('image/users/admin/profile/'.$fileCheck->picture);
                }
                $name = time().rand(1,100).'.'.$picture->extension();
                $picture->move('image/users/admin/profile/', $name);
                $filePicture = $name;

            }
            admin_profiles::where('user_id',$id)->update(['Fname'=>$request->input('fname')]);
            admin_profiles::where('user_id',$id)->update(['Lname'=>$request->input('lname')]);
            if (isset($picture)){
                admin_profiles::where('user_id',$id)->update(['picture'=>$filePicture]);

            }
            return Response::success(true,"با موفقیت بروزرسانی شد");

    }
    public function update_marketer(marketerRequest $request){
        $id = auth()->user()->id;
        $fileCheck = marketer_profile::where('user_id',$id)->first();

            $picture  = $request->file('avatar');
            if (isset($picture)){
                if (!empty($fileCheck->avatar)){
                    unlink('image/users/admin/marketer/'.$fileCheck->avatar);
                }
                $name = time().rand(1,100).'.'.$picture->extension();
                $picture->move('image/users/admin/marketer/', $name);
                $filePicture = $name;

            }
            marketer_profile::where('user_id',$id)->update(['Fname'=>$request->input('fname')]);
            marketer_profile::where('user_id',$id)->update(['Lname'=>$request->input('lname')]);
            marketer_profile::where('user_id',$id)->update(['card_number'=>$request->input('card_number')]);
            marketer_profile::where('user_id',$id)->update(['shaba_number'=>$request->input('shaba_number')]);
            if (isset($picture)){
                marketer_profile::where('user_id',$id)->update(['picture'=>$filePicture]);

            }
            return Response::success(true,"با موفقیت بروزرسانی شد");

    }
    public function contactus_list(){
        $contactUS = contactus::all();

        return  Response::display($contactUS);

    }
    public function contactus_delete($id){
         contactus::where('id',$id)->delete();
        return Response::success(true,"با موفقیت حذف شد");

    }
    public function setting_website_list(){
        $setting = setting_website::all();

        return  Response::display($setting);

    }
    public function setting_website(SettingRequest $request,$id){
        $Check = setting_website::where('id',$id)->first();

            $website_title = $request->input('website_title');
            $website_copyright = $request->input('website_copyright');
            $website_logo = $request->file('website_logo');
            if (isset($website_logo)){
                if (!empty($Check->logo_website)){
                    unlink('image/setting/Logo/'.$Check->logo_website);
                }
                    $name = time().rand(1,100).'.'.$website_logo->extension();
                    $website_logo->move('image/setting/Logo/', $name);
                    $filePicture = $name;


            }

            $website_favicon = $request->file('website_favicon');
            if (isset($website_favicon)){
                if (!empty($Check->favicon_website)){
                    unlink('image/setting/favicon/'.$Check->favicon_website);
                }
                    $name = time().rand(1,100).'.'.$website_favicon->extension();
                    $website_favicon->move('image/setting/favicon/', $name);
                    $favicon = $name;


            }
            $aboutme = $request->input('aboutme');
            $meta_title = $request->input('meta_title');
            $meta_description = $request->input('meta_description');
            $percent_gift_marketer = $request->input('percent_gift_marketer');

            setting_website::where('id',$id)->update(['title_website'=>$website_title]);
            setting_website::where('id',$id)->update(['copyright_website'=>$website_copyright]);
            setting_website::where('id',$id)->update(['meta_title'=>$meta_title]);
            setting_website::where('id',$id)->update(['percent_gift_marketer'=>$percent_gift_marketer]);
            setting_website::where('id',$id)->update(['meta_description'=>$meta_description]);
            if (isset($website_favicon)){
                setting_website::where('id',$id)->update(['logo_website'=>$filePicture]);
            }
            if (isset($website_favicon)){
                setting_website::where('id',$id)->update(['favicon_website'=>$favicon]);
            }
            setting_website::where('id',$id)->update(['about_me'=>$aboutme]);
            return Response::success(true,"با موفقیت بروزرسانی شد");


    }
    public function social_media_list(){
        $socialMedia = social_media::all();


        return  Response::display($socialMedia);

    }
    public function social_media(socialRequest $request,$id){

            $intagram = $request->input('instagram_id');
            $telegram_id = $request->input('telegram_id');
            $twitter_id = $request->input('twitter_id');
            $bale_id = $request->input('bale_id');
            $eitaa_id = $request->input('eitaa_id');
            $tell = $request->input('phoneNumber');
            $address = $request->input('address');
            $longitude = $request->input('longitude');
            $latitude = $request->input('latitude');
            social_media::where('id',$id)->update(['instagram_id'=>$intagram]);
            social_media::where('id',$id)->update(['telegram_id'=>$telegram_id]);
            social_media::where('id',$id)->update(['twitter_id'=>$twitter_id]);
            social_media::where('id',$id)->update(['bale_id'=>$bale_id]);
            social_media::where('id',$id)->update(['eitaa_id'=>$eitaa_id]);
            social_media::where('id',$id)->update(['tell'=>$tell]);
            social_media::where('id',$id)->update(['address'=>$address]);
            social_media::where('id',$id)->update(['longitude'=>$longitude]);
            social_media::where('id',$id)->update(['latitude'=>$latitude]);

            return Response::success(true,"با موفقیت بروزرسانی شد");

    }
    public function admin_users(){
        $admin_users = admin_profiles::join('users','users.id','=','admin_profiles.user_id')->get();

        return  Response::display($admin_users);

    }
    public function marketer_users(){
        $marketer_users = marketer_profile::join('users','users.id','=','marketer_profiles.user_id')->get();

        return  Response::display($marketer_users);

    }
    public function user_users(){
        $admin_users = user_profile::join('users','users.id','=','user_profiles.user_id')->get();

        return  Response::display($admin_users);

    }
    public function reporter_users(){
        $admin_users = reporter_profile::join('users','users.id','=','reporter_profiles.user_id')->get();

        return  Response::display($admin_users);

    }
    public function user_remove($id){
         User::where('id',$id)->delete();

        return Response::success(true,"با موفقیت حذف شد");

    }
    public function user_create(UserRequest $request){

            $email = $request->input('email');
            $UserCheck = User::where('email',$email)->count();
            if ($UserCheck == 0){
            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $role = $request->input('role');
            $user = User::create([
                'email'=>$email,
                'password'=>Hash::make('123456'),
                'role'=>$role
            ]);
            if ($user->role == 'admin'){

                admin_profiles::create([
                    'Fname'=>$fname,
                    'Lname'=>$lname,
                    'user_id'=>$user->id,
                ]);
                DB::table('model_has_roles')
                    ->insert([
                        'role_id'=>1,
                        'model_type'=>"App\Models\User",
                        'model_id'=>$user->id
                    ]);
            }elseif ($user->role == 'user'){
                user_profile::create([
                    'Fname'=>$fname,
                    'Lname'=>$lname,
                    'user_id'=>$user->id,
                ]);
            }elseif($user->role == 'reporter'){
                reporter_profile::create([
                    'Fname'=>$fname,
                    'Lname'=>$lname,
                    'user_id'=>$user->id,
                ]);
                DB::table('model_has_roles')
                    ->insert([
                        'role_id'=>1,
                        'model_type'=>"App\Models\User",
                        'model_id'=>$user->id
                    ]);
            }else{
                $rand = rand('9999','100000');
                marketer_profile::create([
                    'Fname'=>$fname,
                    'Lname'=>$lname,
                    'user_id'=>$user->id,
                    'code'=>$rand,
                ]);
                DB::table('model_has_roles')
                    ->insert([
                        'role_id'=>4,
                        'model_type'=>"App\Models\User",
                        'model_id'=>$user->id
                    ]);
            }

            return  Response::AnyResponse(true,"کاربر مورد نظر با موفقیت ثبت شد رمزعبور کاربر : 123456 میباشد",$role);
            }else{

                return Response::success(false,"این ایمیل یکبار در سامانه ثبت شده است");

            }

    }
    public function generateCode($codeLength = 6)
    {
        $max = pow(10, $codeLength);
        $min = $max / 10 - 1;
        $code = mt_rand($min, $max);
        return $code;
    }

    public function trachonesh_admin(){
        $trachonesh = trachonesh::join('user_profiles','user_profiles.user_id','=','trachoneshes.user_id')->get();
        return  Response::display($trachonesh);

    }

    public function menu_save(menuRequest $request){
        $title_menu = $request->input('title_menu');
        $href_menu = $request->input('href_menu');
        $Priority_menu = $request->input('Priority_menu');
        menu::create([
            'title_menu'=>$title_menu,
            'href_menu'=>$href_menu,
            'Priority_menu'=>$Priority_menu,
        ]);
        return Response::success(true,"با موفقیت ثبت شد");

    }
    public function menu_list(){
        $menus = menu::all();
        return  Response::display($menus);

    }
    public function menu_Delete($id){
        menu::where('id',$id)->delete();
        return Response::success(true,"با موفقیت ثبت شد");
    }

    public function update_teacher(teacherRequest $request){
        $fileCheck = teacher_profile::where('user_id',auth()->user()->id)->first();
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $avatar = $request->file('avatar');
        if (isset($avatar)){
                if (!empty($fileCheck->avatar)) {
                    unlink('image/users/teacher/' . $fileCheck->avatar);
                }
                $name = time() . rand(1, 100) . '.' . $avatar->extension();
                $avatar->move('image/users/teacher/', $name);
                $fileAvatar = $name;
        }
        $card_number = $request->input('card_number');
        $phone_number = $request->input('phone_number');
        $shaba_number = $request->input('shaba_number');
        $national_code = $request->input('national_code');
        $type_learn = $request->input('type_learn');
        $hiring_frakhat = $request->input('hiring_frakhat');
        $University_faculty = $request->input('University_faculty');
        $status_education = $request->input('status_education');
        $address = $request->input('address');
        $fish_water = $request->file('fish_water');
        if (isset($fish_water)){
                if (!empty($fileCheck->fish_water)) {
                    unlink('image/users/teacher/fish/' . $fileCheck->upload_national_code);
                }
                $name = time() . rand(1, 100) . '.' . $fish_water->extension();
                $fish_water->move('image/users/teacher/fish/', $name);
                $fileFish = $name;
        }
        teacher_profile::where('user_id',auth()->user()->id)->update(['Fname'=>$fname]);
        teacher_profile::where('user_id',auth()->user()->id)->update(['Lname'=>$lname]);
        teacher_profile::where('user_id',auth()->user()->id)->update(['phone_number'=>$phone_number]);

        if (isset($avatar)){
            teacher_profile::where('user_id',auth()->user()->id)->update(['avatar'=>$fileAvatar]);

        }

        teacher_profile::where('user_id',auth()->user()->id)->update(['card_number'=>$card_number]);
        teacher_profile::where('user_id',auth()->user()->id)->update(['shaba_number'=>$shaba_number]);
        teacher_profile::where('user_id',auth()->user()->id)->update(['national_code'=>$national_code]);
        teacher_profile::where('user_id',auth()->user()->id)->update(['type_learn'=>$type_learn]);
        teacher_profile::where('user_id',auth()->user()->id)->update(['hiring_frakhat'=>$hiring_frakhat]);
        teacher_profile::where('user_id',auth()->user()->id)->update(['University_faculty'=>$University_faculty]);
        teacher_profile::where('user_id',auth()->user()->id)->update(['status_education'=>$status_education]);
        teacher_profile::where('user_id',auth()->user()->id)->update(['address'=>$address]);

        if (isset($fish_water)){
            teacher_profile::where('user_id',auth()->user()->id)->update(['fish_water'=>$fileFish]);
        }

        return Response::success(true,"با موفقیت بروزرسانی شد");

    }
    public function teacher_list(){
        $teachers = teacher_profile::join('users','users.id','=','teacher_profiles.user_id')->get();

        return  Response::display($teachers);

    }
    public function percent_teacher(Request $request,$user_id){
        $money = $request->input('money');

        teacher_profile::where('user_id',$user_id)->update(['percent_money'=>$money]);

        return Response::success(true,"با موفقیت بروزرسانی شد");

    }


    //Courses

    public function marketing_pay($id){
        $pay = markting_pay::join('user_profiles','user_profiles.user_id','=','markting_pays.user_id')
            ->join('courses','courses.id','=','markting_pays.course_id')
            ->where('markting_pays.discount_id',$id)
            ->get();
        return  Response::display($pay);

    }
    public function save_default_course(Request $request){
        $title_course = $request->input('title_course');
        $season_course = $request->file('season_course');
        $name = time().rand(1,100).'.'.$season_course->extension();
        $season_course->move('image/users/teacher/course/', $name);
        $filePicture = $name;
        $link_course = $request->input('link_course');

        course_teacher::create([
            'title_course'=>$title_course,
            'season_course'=>$filePicture,
            'url_video_course'=>$link_course,
            'user_id'=>auth()->user()->id,

        ]);
        return Response::success(true,"با موفقیت ثبت شد");


    }
    public function teacher_courses(){

        $courses = course_teacher::join('users','users.id','=','course_teachers.user_id')
            ->select('course_teachers.*','users.name','users.family')
            ->get();

        return  Response::display($courses);

    }
    public function teacher_courses_status(Request $request,$id){
        $check = course_teacher::where('id',$id)->first();
        if ($check->status == 0){
            $state = $request->input('state');
            if ($state == 2){
                $request->validate([
                    'message'=>'Required'
                ]);
            }
            course_teacher::where('id',$id)->update(['status'=>$state]);
            return Response::success(true,"با موفقیت بروزرسانی شد'");


        }else{
            return Response::success(false,"متاسفم یکبار ثبت شده است");


        }
    }

    public function true_status($id){
        $courseCheck = course::where('state_banner',1)->first();
        course::where('id',$courseCheck->id)->update(['state_banner'=>0]);
        $course = course::where('id',$id)->update(['state_banner'=>1]);
        return Response::success(false,"متاسفم یکبار ثبت شده است");

    }

}
