<?php

namespace Modules\ApiFront\Http\Controllers;
use App\Http\Controllers\Controller;
use Modules\ApiFront\Http\ResponderFacade;
use Modules\Contact\Database\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Modules\Contact\Database\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class SubscriberController extends Controller
{


    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.required' => 'فیلد ایمیل الزامی است.',
            'email.email' => 'لطفا یک ایمیل معتبر وارد کنید.',
            'email.unique' => 'این ایمیل قبلا ثبت شده است.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], JsonResponse::HTTP_BAD_REQUEST);
        }

        Subscriber::create([
            'email' => $request->email,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'اطلاعات شما با موفقیت ثبت شد. با تشکر از عضویت شما در خبرنامه!',
        ], JsonResponse::HTTP_OK);
    }





}
