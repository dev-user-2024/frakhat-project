<?php

namespace Modules\CartItem\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\CartItem\Database\Models\Cart;
use Modules\CartItem\Database\Models\CartItem;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{

    public function addToCart(Request $request)
    {
        $user_id = $request->input('user_id');
        $course_id = $request->input('course_id');

        $course = Course::find($course_id);


        if($course)
        {
            DB::beginTransaction();

            try {
                // Find the user's cart or create a new one
                $cart = Cart::firstOrCreate(['user_id' => $user_id]);

                $existingCartItem = CartItem::where('cart_id', $cart->id)
                    ->where('course_id', $course_id)
                    ->exists();

                if ($existingCartItem) {
                    DB::rollback();
                    return response()->json([
                        'status' => 'error',
                        'message' => 'این دوره از قبل در سبد خرید موجود است.'
                    ], Response::HTTP_CONFLICT);
                }

                $cartItem = new CartItem([
                    'cart_id' => $cart->id,
                    'course_id' => $course_id,
                    'price' => $course->price_course,
                ]);
                $cartItem->save();

                $cart->course_count += 1;
                $cart->total_price += $course->price_course;
                $cart->save();

                DB::commit();

                return response()->json([
                    'status' => 'success',
                    'message' => 'دوره به سبد خرید اضافه شد.'
                ], Response::HTTP_OK);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json([
                    'status' => 'error',
                    'message' => 'افزودن دوره به سبد خرید انجام نشد. لطفاً بعداً دوباره امتحان کنید.'
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

        }

        return response()->json([
            'status' => 'error',
            'message' => 'دوره مورد نظر یافت نشد'
        ]);

    }



    public function addListToCart(Request $request)
    {
        $request->validate([
            'course_ids' => 'required|array',
            'course_ids.*' => 'exists:courses,id',
        ]);

        $cart = Cart::where('user_id', $request->user_id)->first();

        // Check if the user has a cart
        if (!$cart) {
            // If the user doesn't have a cart, create a new one
            $cart = new Cart();
            $cart->user_id = $request->user_id;
            $cart->save();
        }

        // Add the courses to the cart
        foreach ($request->course_ids as $courseId) {
            $course = Course::findOrFail($courseId);

            // Check if the course already exists in the cart
            $existingCartItem = CartItem::where('cart_id', $cart->id)
                ->where('course_id', $course->id)
                ->first();

            if ($existingCartItem) {
                // If the course already exists, update its price and discounted price
                $existingCartItem->price = $course->price;
                $existingCartItem->discounted_price = $course->discounted_price;
                $existingCartItem->save();
            } else {
                // If the course doesn't exist, create a new cart item
                $cartItem = new CartItem();
                $cartItem->course_id = $course->id;
                $cartItem->cart_id = $cart->id;
                $cartItem->price = $course->price;
                $cartItem->discounted_price = $course->discounted_price;
                $cartItem->save();
            }
        }

        // Update the cart's total price and course count
        $cart->total_price = $cart->cartItems->sum('price');
        $cart->discounted_total_price = $cart->cartItems->sum('discounted_price');
        $cart->course_count = $cart->cartItems->count();
        $cart->save();

        // Return the updated cart
        return response()->json([
            'status' => 'success',
            'message' => 'Courses added to cart successfully.',
            'cart' => $cart,
        ]);
    }

    public function addList(Request $request)
    {
        $cart = Cart::where('user_id', (int) $request->user_id)->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = $request->user_id;
            $cart->save();
        }

        // Convert the JSON course IDs to an array
        $courseIds = json_decode($request->course_ids, true);

        // Check if all courses already exist in the cart
        $existingCourseIds = CartItem::where('cart_id', $cart->id)
            ->whereIn('course_id', $courseIds)
            ->pluck('course_id')
            ->toArray();

        $newCourseIds = array_diff($courseIds, $existingCourseIds);

        // Check if all courses already exist in the cart
        if (empty($newCourseIds)) {
            return response()->json([
                'status' => 'error',
                'message' => 'All courses already exist in the cart.',
            ]);
        }

        // Add the new courses to the cart
        foreach ($newCourseIds as $courseId) {
            $course = Course::findOrFail($courseId);

            // Add the course to the cart
            $cartItem = new CartItem();
            $cartItem->course_id = $course->id;
            $cartItem->cart_id = $cart->id;
            $cartItem->price = $course->price_course;
            $cartItem->discounted_price = 0;
            $cartItem->save();
        }

        $cart->total_price = $cart->cartItems->sum('price');
        $cart->discounted_total_price = $cart->cartItems->sum('discounted_price');
        $cart->course_count = $cart->cartItems->count();
        $cart->save();

        // Return the updated cart
        return response()->json([
            'status' => 'success',
            'message' => 'Courses added to cart successfully.',
            'cart' => $cart,
        ]);
    }


//    public function addList(Request $request)
//    {
////        $request->validate([
////            'course_ids' => 'required|array',
////            'course_ids.*' => 'exists:courses,id',
////        ]);
//
//        $cart = Cart::where('user_id', (int)($request->user_id))->first();
//
//        if (!$cart) {
//            $cart = new Cart();
//            $cart->user_id = $request->user_id;
//            $cart->save();
//        }
//
//        // Add the courses to the cart
//        foreach (json_decode($request->course_ids) as $courseId) {
//            $course = Course::findOrFail($courseId);
//
//            // Check if the course already exists in the cart
//            $existingCartItem = CartItem::where('cart_id', $cart->id)
//                ->where('course_id', $course->id)
//                ->first();
//
//            if ($existingCartItem) {
//                $existingCartItem->price = $course->price_course;
//                $existingCartItem->discounted_price = 0;
//                $existingCartItem->save();
//            } else {
//                $cartItem = new CartItem();
//                $cartItem->course_id = $course->id;
//                $cartItem->cart_id = $cart->id;
//                $cartItem->price = $course->price_course;
//                $cartItem->discounted_price = 0;
//                $cartItem->save();
//            }
//        }
//
//        $cart->total_price = $cart->cartItems->sum('price');
//        $cart->discounted_total_price = $cart->cartItems->sum('discounted_price');
//        $cart->course_count = $cart->cartItems->count();
//        $cart->save();
//
//        // Return the updated cart
//        return response()->json([
//            'status' => 'success',
//            'message' => 'Courses added to cart successfully.',
//            'cart' => $cart,
//        ]);
//
//    }



}
