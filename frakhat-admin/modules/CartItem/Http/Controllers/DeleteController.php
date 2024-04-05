<?php

namespace Modules\CartItem\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Modules\CartItem\Database\Models\Cart;
use Modules\CartItem\Database\Models\CartItem;

class DeleteController extends Controller
{

    public function removeFromCart(Request $request)
    {
        $user_id = $request->input('user_id');
        $course_id = $request->input('course_id');

        DB::beginTransaction();

        try {
            $cart = Cart::where('user_id', $user_id)->first();

            if (!$cart) {
                DB::rollback();
                return response()->json([
                    'status' => 'error',
                    'message' => 'سبد خرید برای کاربر یافت نشد.'
                ], Response::HTTP_NOT_FOUND);
            }

            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('course_id', $course_id)
                ->first();

            if (!$cartItem) {
                DB::rollback();
                return response()->json([
                    'status' => 'error',
                    'message' => 'دوره در سبد خرید یافت نشد.'
                ], Response::HTTP_NOT_FOUND);
            }

            $coursePrice = $cartItem->price;

            $cartItem->delete();

            $cart->course_count -= 1;
            $cart->total_price -= $coursePrice;
            $cart->save();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'دوره از سبد خرید حذف شد.'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'status' => 'error',
                'message' => 'حذف دوره از سبد خرید انجام نشد. لطفاً بعداً دوباره امتحان کنید.'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



}
