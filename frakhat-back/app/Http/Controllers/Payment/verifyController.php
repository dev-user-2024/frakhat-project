<?php

namespace App\Http\Controllers\Payment;

use App\Models\course;
use App\Models\discount_code_course;
use App\Models\marketer_profile;
use App\Models\marketing_link;
use App\Models\markting_pay;
use App\Models\setting_website;
use App\Models\trachonesh;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Payment\Facade\Payment;

class verifyController extends PaymentController
{

    public function verify(Request $request){

        $course_id = $request->input('id');
        $user_id = $request->input('user_id');
        $code = $request->input('code');
        $code_marketing = $request->input('code_marketing');

        $Authority = $_GET['Authority'];
        $Status = $_GET['Status'];

        $course = course::query()->where('id', $course_id)->get()->first();
        $user = User::query()->where('id', $user_id)->get()->first();
        $discountCodesFirst = discount_code_course::where('code', $code)->first();
        // Calculate real amount
        $amount = parent::calculateCoursePrice($course, $code);

        try {
            $receipt = Payment::via('rayanpay-v2')->amount($amount)->transactionId($Authority)
                ->verify();
            $transaction = trachonesh::query()->where('authority',$Authority)->first();
            $discountCode = discount_code_course::whereJsonContains('course_id', ["$course_id"])->first();


            $refId= $receipt->getReferenceId();
            $transaction->update([
                'refId' => $refId,
                'status'=>1
            ]);
            $v = verta();
            $v->timezone = 'Asia/Tehran';

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
                if($usermar) {
                    $date = verta();
                    $date->timezone = "Asia/Tehran";
                    marketing_link::create([
                        'user_id' => $usermar->user_id,
                        'ip' => request()->ip(),
                        'date_register' => $date->format('Y-m-d h:m'),
                    ]);
                }
            }

            return Response::awayToFront('100',$receipt->getReferenceId());

        } catch (InvalidPaymentException $exception) {
            // return 'sdfsdfsd';
            return Response::awayToFront('-1',$exception->getMessage());
        }
    }

}
