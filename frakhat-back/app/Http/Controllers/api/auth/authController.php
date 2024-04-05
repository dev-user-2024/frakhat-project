<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\v1\UserResourse;
use App\Models\reporter_profile;
use App\Models\Token;
use App\Models\User;
use App\Models\user_profile;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;


class authController extends Controller
{
    public function sender($mobile , $message){

        $username = "mohammadkhlaji";
        $password = "1326848";

        $Auth = $username . ":" . $password;
        $encodedAuth = base64_encode($Auth);
        $authHeader = "Basic " . $encodedAuth;


        $response = Http::withHeaders([
            'Authorization' => $authHeader,
        ])->post("https://smspanel.trez.ir/api/smsAPI/SendMessage",[
            "PhoneNumber" => "9830006859000999",
            "Message"=> $message,
            "Mobiles" => [(string)$mobile],
            'UserGroupID' => uniqid(),
            'SendDateInTimeStamp' => time(),
        ]);
        return $response;
    }

    public function sentLoginCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|size:11'
        ]);

        if ($validator->fails()) {
            return Response::success("402",$validator->errors() );
        }

        $mobile = $request->input('mobile');
        $user = User::query()->where('mobile', $mobile)->first();
        $code = rand(1000,9999);
        if(!$user){
            $user = User::create([
                'name' => 'کاربر جدید',
                'email' => null,
                'mobile' => $mobile,
                'password' => Hash::make($mobile)
            ]);
        }
        $user->update([
           'login_sms_code' => $code
        ]);

        $message = "کد ورود شما به فراخط: $code";
        // return $res = $this->sender($mobile,$message);
        // send sms to user
        return Response::success("200", "کد ورود برای شما ارسال شد".$code);
    }


    public function loginWithCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|size:11',
            'login_code' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::success("402",$validator->errors() );
        }

        $mobile = $request->input('mobile');
        $code = $request->input('login_code');
        $user = User::query()->where('mobile', $mobile)->first();

        if ($user) {
            if ($user->login_sms_code == $code) {
                $token = $user->createToken('API TOKEN')->plainTextToken;
                return Response::LoginCode($token, new UserResourse($user));

            }
            return Response::success("402", "کد وارد شده صحیح نمیباشد");
        } else {
            return Response::success("404", "کاربر مورد نظر یافت نشد");

        }
    }

    public function loginUsers(LoginRequest $request)
    {

        if (!Auth::attempt($request->only(['email', 'password']))) {

            return Response::success("402", "ایمیل با رمزعبور مطابقت ندارد دوباره تلاش نمایید");
        }
        $user = User::where('email', $request->email)->first();

        return Response::LoginCode($user->createToken('API TOKEN')->plainTextToken, new UserResourse($user));

    }

    public function register_reporter(RegisterRequest $request)
    {

        $email = $request->input('email');
        $UserCheck = User::where('email', $email)->count();
        if ($UserCheck == 0) {

            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $national_code = $request->input('national_code');
            $phoneNumber = $request->input('phoneNumber');
            $password = $request->input('password');
            $User = User::create([
                'email' => $email,
                'password' => Hash::make($password),
                'role' => "reporter",
            ]);
            reporter_profile::create([
                'Fname' => $fname,
                'Lname' => $lname,
                'national_code' => $national_code,
                'phone_number' => $phoneNumber,
                'user_id' => $User->id,
            ]);
            DB::table('model_has_roles')
                ->insert([
                    'role_id' => 3,
                    'model_type' => 'App\Models\User',
                    'model_id' => $User->id,
                ]);
            return Response::success("200", "با موفقیت ثبت شد");

        } else {
            return Response::success("401", "متاسفم این ایمیل یکبار ثبت شده است");


        }

    }

    public function register_user(RegisterUserRequest $request)
    {

        $email = $request->input('email');
        $UserCheck = User::where('email', $email)->count();
        if ($UserCheck == 0) {

            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $password = $request->input('password');
            $User = User::create([
                'email' => $email,
                'password' => Hash::make($password),
                'role' => "user",
            ]);
            user_profile::create([
                'Fname' => $fname,
                'Lname' => $lname,
                'user_id' => $User->id,
            ]);
            DB::table('model_has_roles')
                ->insert([
                    'role_id' => 2,
                    'model_type' => 'App\Models\User',
                    'model_id' => $User->id,
                ]);
            return Response::success("200", "با موفقیت ثبت شد");

        } else {
            return Response::success("401", "متاسفم این ایمیل یکبار ثبت شده است");


        }

    }

    public function logoutUsers(Request $request)
    {
        auth()->user()->tokens()->delete();

        return Response::success(true, "کاربر با موفقیت خارج شد");

    }

    public function build_code(Request $request)
    {
        $id = auth()->user()->id;
        $phoneNumber = reporter_profile::where('user_id', $id)->first();
        $code = $this->generateCode();
        Token::create([
            'code' => $code,
            'user_id' => $id
        ]);
        return response()->json([
            'status' => true,
            'message' => 'کد با موفقیت ارسال شد',
            'code' => $code
        ]);
    }

    public function build_code_check(Request $request)
    {
        $id = auth()->user()->id;
        $code = $request->input('code');
        $tokens = Token::where('user_id', $id)->where('code', $code)->count();
        if ($tokens >= 1) {
            reporter_profile::where('user_id', $id)->update(['check_phone' => 1]);

            return Response::success(true, "احرازهویت شما با موفقیت انجام شد");

        } else {
            Token::where('user_id', $id)->delete();

            return Response::success(false, "کدتایید اشتباه است لطفا دوباره درخواست دهید");


        }
    }
}
