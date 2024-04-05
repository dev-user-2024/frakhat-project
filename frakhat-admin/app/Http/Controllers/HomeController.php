<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\discount_code_course;
use App\Models\marketer_profile;
use App\Models\marketing_link;
use App\Models\markting_pay;
use App\Models\setting_website;
use App\Models\trachonesh;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function change_password()
    {
        return view('home');
    }

    public function payment_gateway(Request $request)
    {
        $course_id = $request->get('id');
        $user_id = $request->get('user_id');
        $code_marketing = $request->input('code_mark');
        $code = $request->input('code');

        $course = course::query()->findOrFail($course_id);
        $user = User::query()->findOrFail($user_id);
        $user_profile = $user->profile;

        $discountCode = discount_code_course::query()->whereJsonContains('course_id', ["$course->id"])->first();
        if (isset($discountCode)) {
            $discountCodes = discount_code_course::query()->where('code', $code)->count();
            if ($discountCodes == 1) {
                $price = $course->price_course - $discountCode->price_gift;
            } else {
                $price = $course->price_course;
            }
        } else {
            $price = $course->price_course;
        }

        $price;
        $description = [
            "name" => $user_profile ? $user_profile->Fname : $user->email,
            "family" => $user_profile ? $user_profile->Lname : $user->email,
            "email" => $user->email,
            "course" => $course->title_course
        ];
        $response = Http::post('https://pms.rayanpay.com/api/v2/ipg/paymentrequest', [
            "merchantID" => env('MERCHANT_ID'),
            "amount" => intval($price),
            "description" => json_encode($description),
            "email" => $user->profile->email,
            "mobile" => $this->convert($user->profile->mobile),
            "callbackURL" => route('verify_payment_gateway', [
                'id' => $course->id,
                'user_id' => $user_id,
                'code' => $code,
                'code_marketing' => $code_marketing
            ])
        ]);
        if($response->ok()){
            $status = $response->json(['status']) == 100;
            $authority = $response->json('authority');
            if ($status == 100) {

                // $v = verta();
                // $v->timezone = 'Asia/Tehran';
                // $transaction = trachonesh::create([
                //     'user_id' => $user->id,
                //     'data_buy' => $v->format('Y-%B-d'),
                //     'money' => $course->price_course,
                //     'authority' => $authority,
                //     'description' => "خرید برای دوره:" . $course->title_course,
                //     'status' => 0
                // ]);

                header('Location: https://pms.rayanpay.com/pg/startpay/' . $authority);
            }else{
                return Response::awayToFront('-5','اتصال به درگاه پذیرفته نشد، دوباره تلاش کنید');
            }
        }
        return Response::awayToFront('-4','پاسخی از بانک دریافت نشد');
    }


    public function verify_payment_gateway(Request $request)
    {

        $id = $request->input('id');
        $user_id = $request->input('user_id');
        $code_marketing = $request->input('code_marketing');

        $user=User::query()->find($user_id);
        $course = course::query()->find($id);

        $v = verta();
        $v->timezone = 'Asia/Tehran';

        $discountCode = discount_code_course::whereJsonContains('course_id', ["$id"])->first();
        if (isset($discountCode)) {
            $discountCodes = discount_code_course::where('code', $request->input('code'))->count();
            $discountCodesFirst = discount_code_course::where('code', $request->input('code'))->first();
            if ($discountCodes == 1) {
                $price = $course->price_course - $discountCode->price_gift;
            } else {
                $price = $course->price_course;
            }
        } else {
            $price = $course->price_course;
        }

        $Authority = $_GET['Authority'];
        $Status = $_GET['Status'];

        if ($Status == "OK") {
            $response = Http::post("https://pms.rayanpay.com/api/v2/ipg/paymentVerification", [
                "merchantID" => env('MERCHANT_ID'),
                "amount" => intval($price),
                "authority" => $Authority
            ]);
            $status = $response->json('status');
            $refId = $response->json('refId');

            $transaction = trachonesh::query()->where('authority',$Authority)->first();

            if ($status == 100) {
                if ($transaction){
                    $transaction->update([
                        'refId' => $refId,
                        'status'=>1
                    ]);
                    $user->orders()->create([
                        'course_id' => $course->id,
                        'date_buy' => $v->format('Y-%B-d'),
                    ]);

                    if (isset($discountCode->price_gift)) {
                        $setting = setting_website::first();
                        $check = $discountCode->price_gift * $setting->percent_gift_marketer;
                        $priceCheck = $discountCode->price_gift - $check;
                        $date = verta();
                        $date->timezone = "Asia/Tehran";
                        markting_pay::create([
                            'discount_id' => $discountCodesFirst->id,
                            'user_id' => $user_id,
                            'course_id' => $course->id,
                            'money' => $priceCheck,
                            'ip' => request()->ip(),
                            'date_register' => $date->format('Y-m-d h:m')
                        ]);
                    }
                    if (isset($code_marketing)) {
                        $usermar = marketer_profile::where('code', $code_marketing)->first();
                        $date = verta();
                        $date->timezone = "Asia/Tehran";
                        marketing_link::create([
                            'user_id' => $usermar->user_id,
                            'ip' => request()->ip(),
                            'date_register' => $date->format('Y-m-d h:m'),
                        ]);
                    }
                    return Response::awayToFront('100','پرداخت موفق. دوره برای شما ثبت شد');

                }else{
                    return Response::awayToFront('-3','تراکنشی یافت نشد');

                }
            } else {
                $transaction->update(['status'=>-1]);

                return Response::awayToFront('-2','عملیات پرداخت با شکست روبرو شد');
            }
        } else {
            return Response::awayToFront('-1','از پراخت منصرف شدید');
        }
    }

    public function register_users()
    {
        return view('auth.register_users');
    }
}
