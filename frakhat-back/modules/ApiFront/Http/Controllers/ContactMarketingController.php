<?php

namespace Modules\ApiFront\Http\Controllers;
use App\Http\Controllers\Controller;
use Modules\ApiFront\Http\ResponderFacade;
use Modules\Contact\Database\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Modules\Contact\Database\Models\ContactMarketing;
use Modules\Contact\Database\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class ContactMarketingController extends Controller
{


    public function contactMarketing(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'message' => 'required',
            'full_name' => 'required',
        ], [
            'mobile.required' => 'فیلد موبایل الزامی است.',
            'message.required' => 'فیلد پیام الزامی است',
            'full_name.required' => 'فیلد نام و نام خانوادگی الزامی است',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], JsonResponse::HTTP_BAD_REQUEST);
        }

        ContactMarketing::create([
            'mobile' => $request->mobile,
            'full_name' => $request->full_name,
            'message' => $request->message,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'اطلاعات شما با موفقیت ثبت شد. تشکر از شما!',
        ], JsonResponse::HTTP_OK);
    }





}
