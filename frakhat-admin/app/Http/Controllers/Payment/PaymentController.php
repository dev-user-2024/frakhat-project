<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\discount_code_course;
use App\Models\trachonesh;
use App\Models\User;
use App\Models\user_profile;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Calculate final amout.
     *
     * @param course $course
     *
     * @return int
     */


    public function createDescription(User $user,course $course,$encode = false): array
    {
        $user_profile = $user->profile;

        $description = [
            "name" => $user_profile ? $user_profile->Fname : $user->email,
            "family" => $user_profile ? $user_profile->Lname : $user->email,
            "email" => $user->email,
            "course" => $course->title_course,
            "course_id" => $course->id
        ];

        return $description;
    }
    public function createTransaction(User $user,course $course,$transactionId){
        $v = verta();
        $v->timezone = 'Asia/Tehran';
        return trachonesh::create([
            'user_id' => $user->id,
            'data_buy' => $v->format('Y-%B-d'),
            'money' => $course->price_course,
            'authority' => $transactionId,
            'description' => "خرید برای دوره:" . $course->title_course,
            'status' => 0
        ]);
    }
    public function calculateCoursePrice(course $course,$discountCode = 0) : int {

        $discount = discount_code_course::query()->whereJsonContains('course_id', ["$course->id"])->first();

        if (isset($discount)) {
            $discountCodes = discount_code_course::query()->where('code', $discountCode)->count();
            if ($discountCodes == 1) {
                $price = $course->price_course - $discount->price_gift;
            } else {
                $price = $course->price_course;
            }
        } else {
            $price = $course->price_course;
        }

        return (int) $price;
    }
}
