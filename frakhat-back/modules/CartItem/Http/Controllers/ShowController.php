<?php

namespace Modules\CartItem\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\course;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\CartItem\Database\Models\Cart;
use Modules\CartItem\Database\Models\CartItem;
use Illuminate\Http\Response;
use Modules\Discount\Database\Models\Discount;
use Modules\Discount\Database\Models\DiscountUsage;

class ShowController extends Controller
{
    public function show($user_id)
    {
        if (auth('sanctum')->check()) {
            $user = Auth::guard('sanctum')->user();
            $cart = Cart::where('user_id', $user->id)->first();

            if (!$cart) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'سبدخرید خالی است'
                ], Response::HTTP_OK);
            }
            $cartItems = CartItem::where('cart_id', $cart->id)
                ->with('course.courseCategory')
                ->get();

            if ($cartItems->isEmpty()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'سبدخرید خالی است'
                ], Response::HTTP_OK);
            }

            $discountCode = request()->input('discount_code');
            if($discountCode)
            {
                return $this->applyDiscountCode($discountCode, $user_id, $cartItems);
            }
            else {
                $data = $this->getCartitems($cartItems, $user_id, $cart);
                return response()->json([
                    'status' => 'success',
                    'data' => $data
                ], Response::HTTP_OK);
            }
        }

        return response()->json([
            'status' => 'error',
            'message' => 'خطای احراز هویت !'
        ], Response::HTTP_BAD_REQUEST);
    }


    public function applyDiscountCode($discountCode, $userId, $cartItems)
    {

        $cart = Cart::where('user_id', $userId)->first();

        $discounted_total_price = 0;
        $total_price = 0;

        // بررسی وجود کد تخفیف
        $discount = Discount::where('code', $discountCode)->first();

        if (!$discount) {
            $data = $this->getCartitems($cartItems, $userId, $cart);
            return response()->json([
                'message' => 'کد تخفیف وارد شده معتبر نیست.',
                'data' => $data
            ], 422);
        }

        // بررسی منقضی شدن کد تخفیف
        if ($discount->expired_at && Carbon::now()->isAfter($discount->expired_at)) {
            $data = $this->getCartitems($cartItems, $userId, $cart);
            return response()->json([
                'message' => 'کد تخفیف منقضی شده است.',
                'data' => $data
            ], 422);
        }

        // بررسی تعداد دفعات استفاده از کد تخفیف برای کاربر
        $usageCount = DiscountUsage::where('user_id', $userId)
            ->where('discount_id', $discount->id)
            ->count();

        if ($usageCount && $discount->maxOfUser && $usageCount >= $discount->maxOfUser) {
            $data = $this->getCartitems($cartItems, $userId, $cart);
            return response()->json([
                'message' => 'شما قبلاً از این کد تخفیف استفاده کرده‌اید و تعداد دفعات استفاده مجاز را برای شما گذشته است.',
                'data' => $data
            ], 422);
        }


        $userCart = Cart::where('user_id', $userId)->first();
        $messageCourses = '';
        $data = [];
        foreach ($userCart->cartItems as $cartItem) {
            $course = course::find($cartItem->course_id);

            if($discount->type == 'course_category') {
                if ($course->course_category_id == $discount->type_id)
                {
                    $discountedPrice = $this->calculateDiscountedPrice(intval($course->price_course), $discount->percent);
                    $discountAmount = intval($course->price_course) - intval($discountedPrice);
                    if ($discountAmount <= $discount->maxOfPrice) {
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
                            'discounted_price' => intval($course->price_course) - $discount->maxOfPrice,
                            'price_course' => $course->price_course,
                        ];
                        $discounted_total_price += intval($course->price_course) - $discount->maxOfPrice;

                    }

                } else  {
                    $messageCourses .= $course->title_course . ' , ';
                    $data['cart_items']['course'][] = [
                        'id' => $course->id,
                        'title_course' => $course->title_course,
                        'slug' => $course->slug,
                        'discounted_price' => $course->price_course,
                        'price_course' => $course->price_course,
                    ];
                    $discounted_total_price += intval($course->price_course);


                }
            }
            elseif($discount->type == 'course') {
                if ($course->id == $discount->type_id) {
                    $discountedPrice = $this->calculateDiscountedPrice(intval($course->price_course), $discount->percent);
                    $discountAmount = intval($course->price_course) - intval($discountedPrice);
                    if ($discountAmount <= $discount->maxOfPrice) {
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
                            'discounted_price' => intval($course->price_course) - $discount->maxOfPrice,
                            'price_course' => $course->price_course,
                        ];
                        $discounted_total_price += intval($course->price_course) - $discount->maxOfPrice;

                    }
                } else  {
                    $messageCourses .= $course->title_course . ' , ';
                    $data['cart_items']['course'][] = [
                        'id' => $course->id,
                        'title_course' => $course->title_course,
                        'slug' => $course->slug,
                        'discounted_price' => $course->price_course,
                        'price_course' => $course->price_course,
                    ];
                    $discounted_total_price += intval($course->price_course);


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



    public function calculateDiscountedPrice($price, $percent)
    {
        return $price - ($price * ($percent / 100));
    }

    public function getCartitems($cartItems, $user_id, $cart): array
    {
        $data = [];
        $total_price = 0;

        foreach ($cartItems as $cartItem) {
            $course = $cartItem->course;

            $data['cart_items']['course'][] = [
                'id' => $course->id,
                'title_course' => $course->title_course,
                'slug' => $course->slug,
                'discounted_price' => $course->price_course,
                'price_course' => $course->price_course,
            ];
            $total_price += intval($course->price_course);


        }
        $data['total_price'] = $total_price;
        $data['discounted_total_price'] = $total_price;
        $data['user_id'] = $user_id;
        $data['cart_id'] = $cart->id;
        return $data;
    }


}
