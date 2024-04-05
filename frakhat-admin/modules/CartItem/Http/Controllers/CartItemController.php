<?php

namespace Modules\CartItem\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\course;
use Carbon\Carbon;
use Modules\CartItem\Database\Models\Cart;
use Illuminate\Http\Request;
use Modules\Discount\Database\Models\Discount;
use Modules\Discount\Database\Models\DiscountUsage;

class CartItemController extends Controller
{
    public static function applyDiscountCode($discountCode, $userId)
    {
//        $discountCode = $request->input('discount_code');
//        $userId = $request->input('user_id');
        return \response()->json($discountCode);

        $discounted_total_price = 0;
        $total_price = 0;


        // بررسی وجود کد تخفیف
        $discount = Discount::where('code', $discountCode)->first();

        if (!$discount) {
            return response()->json(['message' => 'کد تخفیف وارد شده معتبر نیست.'], 422);
        }

        // بررسی منقضی شدن کد تخفیف
        if ($discount->expired_at && Carbon::now()->isAfter($discount->expired_at)) {
            return response()->json(['message' => 'کد تخفیف منقضی شده است.'], 422);
        }

        // بررسی تعداد دفعات استفاده از کد تخفیف برای کاربر
        $usageCount = DiscountUsage::where('user_id', $userId)
            ->where('discount_id', $discount->id)
            ->count();

        if ($usageCount && $discount->maxOfUser && $usageCount >= $discount->maxOfUser) {
            return response()->json(['message' => 'شما قبلاً از این کد تخفیف استفاده کرده‌اید و تعداد دفعات استفاده مجاز را برای شما گذشته است.'], 422);
        }

        // بررسی دسته بندی دوره‌های مجاز برای کد تخفیف
        $categoryIds = $discount->discountMarketer->pluck('course_category_id')->toArray();

        $userCart = Cart::where('user_id', $userId)->first();

        $messageCourses = '';
        $data = [];
        foreach ($userCart->cartItems as $cartItem) {
            $course = course::find($cartItem->course_id);

            if (!in_array($course->course_category_id, $categoryIds)) {
                $messageCourses .= $course->title_course . ' , ';
                $discounted_total_price += intval($course->price_course);


            } else if(in_array($course->course_category_id, $categoryIds)) {
                $discountedPrice = CartItemController::calculateDiscountedPrice(intval($course->price_course), $discount->discountMarketer->percent);
                $maxOfPrice = $discount->maxOfPrice;
                $discountAmount = intval($course->price_course) - intval($discountedPrice);
                if ($discountAmount <= $maxOfPrice) {
                    // مبلغ کسر شده از تخفیف کمتر یا مساوی مبلغ ماکزیمم است
                    $data['cart_items']['course'][] = [
                        'id' => $course->id,
                        'title_course' => $course->title_course,
                        'slug' => $course->slug,
                        'discounted_price' => $discountedPrice,
                        'price_course' => $course->price_course,
                    ];
                    $discounted_total_price += intval($discountedPrice);
                } else {

                    $data['cart_items']['course'][] = [
                        'id' => $course->id,
                        'title_course' => $course->title_course,
                        'slug' => $course->slug,
                        'discounted_price' => intval($course->price_course) - $maxOfPrice,
                        'price_course' => $course->price_course,
                    ];
                    $discounted_total_price += intval($course->price_course) - $maxOfPrice;

                }

            }
            $total_price += intval($course->price_course);


        }
        $data['total_price'] = $total_price;

        $data['discounted_total_price'] = $discounted_total_price;
        $data['user_id'] = $userId;
        $data['cart_id'] = $userCart->id;
        if($messageCourses)
            $data ['discount_message'] = 'کد تخفیف وارد شده شامل این دوره ها نمیشود  : ' . $messageCourses;
        else
            $data ['discount_message'] = 'کد تخفیف وارد شده روی همه ی دوره های شما اعمال شد';

        return response()->json([
            'message' => 'کد تخفیف با موفقیت اعمال شد.',
            'data' => $data,
        ]);
    }



    public static function calculateDiscountedPrice($price, $percent)
    {
        return $price - ($price * ($percent / 100));
    }
}
