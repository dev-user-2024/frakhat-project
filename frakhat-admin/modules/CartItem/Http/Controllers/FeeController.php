<?php

namespace Modules\CartItem\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\course;
use App\Models\User;
use Carbon\Carbon;
use Evryn\LaravelToman\Facades\Toman;
use Evryn\LaravelToman\CallbackRequest;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\CartItem\Database\Models\Cart;
use Modules\CartItem\Database\Models\CartItem;
use Modules\CartItem\Database\Models\Fee;
use Modules\CartItem\Database\Models\License;
use Modules\CartItem\Database\Models\Order;
use Modules\CartItem\Database\Models\OrderItem;
use Modules\Discount\Database\Models\Discount;
use Modules\Discount\Database\Models\DiscountUsage;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;



class FeeController extends Controller
{
    public function payment()
    {

        if (auth('sanctum')->check()) {
            $user = Auth::guard('sanctum')->user();
            $cart = $user->cart;
            $user_id = $user->id;
            $discountCode = request()->input('code');

            if (! isset($cart)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'سبد خرید یافت نشد):'
                ], 400);
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

            if($discountCode) {
                $discount = Discount::where('code', $discountCode)->first();
                if ($discount) {
                     $statusDiscount = $this->applyDiscountCode($discountCode, $user_id, $cartItems);
//                    return response()->json([$cart->discounted_total_price]);

                    if($statusDiscount['success'] == false && $statusDiscount['percent'] == 100){

                         $order = $this->insertOrder($cart);
                         $fee = Fee::create([
                             'user_id' => $order->user_id,
                             'order_id' => $order->id,
                             'price' => $order->discounted_total_price != 0 ? $order->discounted_total_price : $order->total_price,
                             'count' => $order->course_count,
                             'transaction_id' => 'transactionId',
                             'description' => "خرید دوره با کد تخفیف ۱۰۰ درصد",
                             'status' => 'completed'
                         ]);
                         foreach ($order->orderItems as $item) {
                             $L = $this->license($fee->user->fullName?? 'user frakhat', [$item->course->spotPlayerID], ['02142863000'], true);
                             License::create([
                                 'user_id' => $fee->user_id,
                                 'fee_id' => $fee->id,
                                 'course_id' => $item->course_id,
                                 'spotPlayerID' => $item->course->spotPlayerID,
                                 'license' => $L['key'],
                             ]);
                         }
                         return response()->json([
                             'status' => 'error',
                             'message' => 'خرید شما با موفقیت انجام شد.'
                         ], 200);

//                         return redirect('https://frakhat.ir/successful-purchase');

                     }

                }
            }


            if($cart->discounted_total_price > 0)
                $amount = $cart->discounted_total_price;
            else
                $amount = $cart->total_price;
//            return response()->json([$amount]);


            $request = Toman::merchantId('50f7597f-a138-4227-82c1-b06d520fcdf7')
                ->amount($amount)
                ->description('Frakhat.ir')
                ->callback(route('verify'))
                ->mobile($user->mobile)
                ->email($user->email ?? 'frakhat@gmail.com')
                ->request();


            if ($request->successful()) {
                // Store created transaction details for verification
                $order = $this->insertOrder($cart);

                $transactionId = $request->transactionId();
                Fee::create([
                    'user_id' => $order->user_id,
                    'order_id' => $order->id,
                    'price' => $order->discounted_total_price != 0 ? $order->discounted_total_price : $order->total_price,
                    'count' => $order->course_count,
                    'transaction_id' => $transactionId,
                    'description' => "خرید دوره:",
                    'status' => 'pending'
                ]);


                return response()->json([
                    'status' => 'success',
                    'url' => $request->paymentUrl()
                ]);
            }

            else if ($request->failed()) {
                // Handle transaction request failure.
                return response()->json([
                    'status' => 'error',
                    'message' => $request->messages()
                ], 400);

            }
            else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'خطای ناشناخته!'
                ], 400);
            }


        }
        return response()->json([
            'status' => 'error',
            'message' => 'خطای احراز هویت !'
        ], Response::HTTP_BAD_REQUEST);


    }

    public function verify(CallbackRequest $request)
    {
        $fee = Fee::where('transaction_id', $request->transactionId())->first();
        $payment = $request->amount($fee->price)->verify();

        if ($payment->successful()) {
            // Store the successful transaction details
            $referenceId = $payment->referenceId();
            $fee->update([
                'ref_id' => $referenceId,
                'status' => 'completed'

            ]);


            try {
                $order = Order::find($fee->order_id);
                foreach ($order->orderItems as $item) {
                    $L = $this->license($fee->user->fullName, [$item->course->spotPlayerID], ['02142863000'], true);
                    License::create([
                        'user_id' => $fee->user_id,
                        'fee_id' => $fee->id,
                        'course_id' => $fee->course_id,
                        'spotPlayerID' => $fee->course->spotPlayerID,
                        'license' => $L['key'],
                    ]);
                }
                return redirect('https://frakhat.ir/successful-purchase');

            }
            catch (Exception $e) {
                Log::info($e->getMessage());
                return redirect('https://frakhat.ir/unsuccessful-purchase');

            }

        }

        if ($payment->alreadyVerified()) {
            return redirect('https://frakhat.ir/unsuccessful-purchase');
        }

        if ($payment->failed()) {
            $fee->update([
                'status' => 'failed'
            ]);
            return redirect('https://frakhat.ir/unsuccessful-purchase');
        }
    }

    public function applyDiscountCode($discountCode, $userId, $cartItems)
    {
        $discounted_total_price = 0;
        $total_price = 0;

        // بررسی وجود کد تخفیف
        $discount = Discount::where('code', $discountCode)->first();

        if (!$discount) {
            return ['success' => false, 'percent' => 0];
        }

        if ($discount->percent == 100) {
            return ['success' => false, 'percent' => 100];
        }

        // بررسی منقضی شدن کد تخفیف
        if ($discount->expired_at && Carbon::now()->isAfter($discount->expired_at)) {
            return ['success' => false, 'percent' => 0];
        }

        // بررسی تعداد دفعات استفاده از کد تخفیف برای کاربر
        $usageCount = DiscountUsage::where('user_id', $userId)
            ->where('discount_id', $discount->id)
            ->count();

        if ($usageCount && $discount->maxOfUser && $usageCount >= $discount->maxOfUser) {
            return ['success' => false, 'percent' => 0];
        }


        $userCart = Cart::where('user_id', $userId)->first();
        foreach ($userCart->cartItems as $cartItem) {
            $course = course::find($cartItem->course_id);

            if($discount->type == 'course_category') {
                if ($course->course_category_id == $discount->type_id)
                {
                    $discountedPrice = $this->calculateDiscountedPrice(intval($course->price_course), $discount->percent);
                    $discountAmount = intval($course->price_course) - intval($discountedPrice);
                    if ($discountAmount <= $discount->maxOfPrice) {
                        // مبلغ کسر شده از تخفیف کمتر یا مساوی مبلغ ماکزیمم است
                        $cartItem->update([
                            'discounted_price' => $discountedPrice
                        ]);

                        $discounted_total_price += intval($discountedPrice);
                    } else {
                        $cartItem->update([
                            'discounted_price' => intval($course->price_course) - $discount->maxOfPrice
                        ]);

                        $discounted_total_price += intval($course->price_course) - $discount->maxOfPrice;

                    }
                    $newDiscountUsage = DiscountUsage::create([
                        'user_id' => $userId,
                        'discount_id' => $discount->id,
                        'course_id' => $course->id,
                        'course_price' => $course->price_course,
                        'discounted_course_price' => '',
                        'user_ip' => request()->getClientIp(),
                        'usage_count' => intval($usageCount) + 1,
                        'discount_code' => $discount->code,
                        'used_at' => now()
                    ]);

                } else  {
                    $cartItem->update([
                        'discounted_price' => $course->price_course
                    ]);

                    $discounted_total_price += intval($course->price_course);


                }
            }
            elseif($discount->type == 'course') {
                if ($course->id == $discount->type_id) {
                    $discountedPrice = $this->calculateDiscountedPrice(intval($course->price_course), $discount->percent);
                    $discountAmount = intval($course->price_course) - intval($discountedPrice);
                    if ($discountAmount <= $discount->maxOfPrice) {
                        // مبلغ کسر شده از تخفیف کمتر یا مساوی مبلغ ماکزیمم است
                        $cartItem->update([
                            'discounted_price' => $discountedPrice
                        ]);

                        $discounted_total_price += intval($discountedPrice);
                    } else {

                        $cartItem->update([
                            'discounted_price' => intval($course->price_course) - $discount->maxOfPrice
                        ]);

                        $discounted_total_price += intval($course->price_course) - $discount->maxOfPrice;

                    }
                    $newDiscountUsage = DiscountUsage::create([
                        'user_id' => $userId,
                        'discount_id' => $discount->id,
                        'course_id' => $course->id,
                        'course_price' => $course->price_course,
                        'discounted_course_price' => '',
                        'user_ip' => request()->getClientIp(),
                        'usage_count' => intval($usageCount) + 1,
                        'discount_code' => $discount->code,
                        'used_at' => now()
                    ]);
                } else  {
                    $cartItem->update([
                        'discounted_price' => $course->price_course
                    ]);

                    $discounted_total_price += intval($course->price_course);


                }
            }

            $total_price += intval($course->price_course);

        }

        $userCart->update([
            'total_price' => $total_price,
            'discounted_total_price' => $discounted_total_price
        ]);

        return ['success' => true, 'percent' => 0];

    }

    public function applyDiscountCodeeee($discountCode, $userId, $cartItems)
    {

        $cart = Cart::where('user_id', $userId)->first();

        $discounted_total_price = 0;
        $total_price = 0;
        $discount = Discount::where('code', $discountCode)->first();
        // بررسی منقضی شدن کد تخفیف
        if ($discount->expired_at && Carbon::now()->isBefore($discount->expired_at)) {
            $usageCount = DiscountUsage::where('user_id', $userId)
                ->where('discount_id', $discount->id)
                ->count();
            if ($discount->maxOfUser && $usageCount <= $discount->maxOfUser) {

                $userCart = Cart::where('user_id', $userId)->first();
                foreach ($userCart->cartItems as $cartItem) {
                    $course = course::find($cartItem->course_id);
                    if($discount->type == 'course_category') {
                        if ($course->course_category_id == $discount->type_id)
                        {
                            $discountedPrice = $this->calculateDiscountedPrice(intval($course->price_course), $discount->discountMarketer->percent);
                            $maxOfPrice = $discount->maxOfPrice;
                            $discountAmount = intval($course->price_course) - $discountedPrice;

                            $newDiscountUsage = DiscountUsage::create([
                                'user_id' => $userId,
                                'discount_id' => $discount->id,
                                'course_id' => $course->id,
                                'course_price' => $course->price_course,
                                'discounted_course_price' => '',
                                'user_ip' => request()->getClientIp(),
                                'usage_count' => intval($usageCount) + 1,
                                'discount_code' => $discount->code,
                                'used_at' => now()
                            ]);
                            if ($discountAmount <= $maxOfPrice) {
                                // مبلغ کسر شده از تخفیف کمتر یا مساوی مبلغ ماکزیمم است
                                $cartItem->discounted_price = $discountedPrice;
                                $cartItem->save();
                                $newDiscountUsage->discounted_course_price = $discountedPrice;
                                $newDiscountUsage->save();
                                $discounted_total_price += $cartItem->discounted_price;
                            } else {
                                // مبلغ کسر شده از تخفیف بیشتر از مبلغ ماکزیمم است
                                $cartItem->discounted_price = intval($course->price_course) - $maxOfPrice;
                                $cartItem->save();
                                $newDiscountUsage->discounted_course_price = intval($course->price_course) - $maxOfPrice;
                                $newDiscountUsage->save();

                                $discounted_total_price += $cartItem->discounted_price;
                            }

                        }  else{
                            $discounted_total_price += $course->price_course;
                        }

                    } elseif($discount->type == 'course') {
                        if ($course->id == $discount->type_id) {
                            $discountedPrice = $this->calculateDiscountedPrice(intval($course->price_course), $discount->discountMarketer->percent);
                            $maxOfPrice = $discount->maxOfPrice;
                            $discountAmount = intval($course->price_course) - $discountedPrice;

                            $newDiscountUsage = DiscountUsage::create([
                                'user_id' => $userId,
                                'discount_id' => $discount->id,
                                'course_id' => $course->id,
                                'course_price' => $course->price_course,
                                'discounted_course_price' => '',
                                'user_ip' => request()->getClientIp(),
                                'usage_count' => intval($usageCount) + 1,
                                'discount_code' => $discount->code,
                                'used_at' => now()
                            ]);
                            // بررسی مبلغ تخفیف و مبلغ ماکزیمم
                            if ($discountAmount <= $maxOfPrice) {
                                // مبلغ کسر شده از تخفیف کمتر یا مساوی مبلغ ماکزیمم است
                                $cartItem->discounted_price = $discountedPrice;
                                $cartItem->save();
                                $newDiscountUsage->discounted_course_price = $discountedPrice;
                                $newDiscountUsage->save();
                                $discounted_total_price += $cartItem->discounted_price;
                            } else {
                                // مبلغ کسر شده از تخفیف بیشتر از مبلغ ماکزیمم است
                                $cartItem->discounted_price = intval($course->price_course) - $maxOfPrice;
                                $cartItem->save();
                                $newDiscountUsage->discounted_course_price = intval($course->price_course) - $maxOfPrice;
                                $newDiscountUsage->save();

                                $discounted_total_price += $cartItem->discounted_price;
                            }
                        }  else{
                            $discounted_total_price += $course->price_course;
                        }

                    }

                }
                $userCart->update([
                    'discounted_total_price' => $discounted_total_price
                ]);

            }
        }

    }

    public function calculateDiscountedPrice($price, $percent)
    {
        return $price - ($price * ($percent / 100));
    }


    public function filter($a): array {
            return array_filter($a, function ($v) { return !is_null($v); });
        }

    public function request($u, $o = null) {
        $API = 'ZL4WDjXKGe5u4QKImPiFvlP93VU=';

        curl_setopt_array($c = curl_init(), [
                CURLOPT_URL => $u,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => $o ? 'POST' : 'GET',
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_HTTPHEADER => ['$API: ' . $API, '$LEVEL: -1', 'content-type: application/json' ],
            ]);
            if ($o) curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($this->filter($o)));
            $json = json_decode(curl_exec($c), true);
            curl_close($c);
            if (is_array($json) && ($ex = @$json['ex'])) throw new Exception($ex['msg']);
            return $json;
        }

    public function license($name, $courses, $watermarks, $test) {
            return $this->request('https://panel.spotplayer.ir/license/edit/', [
                'test' => $test,
                'name' => $name ?? 'without name',
                'course' => $courses,
                'watermark' => ['texts' => array_map(function ($w) { return ['text' => $w]; }, $watermarks)]
            ]);
        }/**
 * @return mixed
 * @param array $orderItems
 * @param $cart
 */
    public function insertOrder($cart)
    {
        $order = Order::create([
            'user_id' => $cart->user_id,
            'total_price' => $cart->total_price,
            'discounted_total_price' => $cart->discounted_total_price,
            'course_count' => $cart->course_count,
        ]);

        $orderItems = [];
        foreach ($cart->cartItems as $item) {
            $orderItems[] = [
                'user_id' => $item->user_id,
                'course_id' => $item->course_id,
                'price' => $item->price,
                'discounted_price' => $item->discounted_price,
            ];
        }

        $order->orderItems()->createMany($orderItems);
        $cart->cartItems()->delete();
        $cart->delete();
        return $order;
    }


}
