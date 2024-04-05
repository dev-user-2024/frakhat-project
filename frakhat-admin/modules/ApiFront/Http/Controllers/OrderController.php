<?php

namespace Modules\ApiFront\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\ApiFront\Http\Resources\OrderResource;
use Modules\CartItem\Database\Models\Order;


class OrderController extends Controller
{
    public function getUserPurchasedCourses($userId)
    {
//        $userOrders = Order::with('courses')->where('user_id', $userId)->get();


        if (auth('sanctum')->check()) {
            $user = Auth::guard('sanctum')->user();
//            $userCourses = $user->courses()
//                ->select('courses.*', 'licenses.license')
//                ->join('licenses', 'licenses.course_id', '=', 'courses.id')
//                ->where('licenses.user_id', $user->id)
//                ->whereHas('licenses', function ($query) {
//                    $query->whereHas('fee', function ($query) {
//                        $query->where('status', 'completed');
//                    });
//                })
//                ->get();

            $data  = [
                'user_id' => $user->id,
            ];
            foreach ($user->license as $item)
            {
                $data['course'][] = [
                    'fee_id' => $item->fee_id,
                    'license' => $item->license,
                    'created_at' => $item->created_at,
                    'course' => $item->course,
                ];
            }
            return response()->json($data);

        }
        return response()->json([
            'status' => 'error',
            'message' => 'خطای احراز هویت !'
        ], Response::HTTP_BAD_REQUEST);
    }
}
