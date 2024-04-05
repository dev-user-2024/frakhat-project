<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\DiscountRequest;
use App\Models\discount_code_course;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Validator;

class discountController
{
    public function discount_admin_list()
    {
        $discound = discount_code_course::join('marketer_profiles', 'marketer_profiles.user_id', '=', 'discount_code_courses.user_id')
            ->select('discount_code_courses.*', 'marketer_profiles.Fname', 'marketer_profiles.Lname')
            ->get();
        return Response::display($discound);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discountCode = discount_code_course::where('user_id', 1)->get();
        return Response::display($discountCode);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountRequest $request)
    {
        $validation = Validator::make($request->all(), [
            'price' => 'Required',
            'code' => 'Required',
            'course_id.*' => 'Required',
        ]);
        if ($validation->fails()) {
            return Response::errors(false, $validation->errors());
        }
        $price = $request->input('price');
        $code = $request->input('code');

        $CheckCode = discount_code_course::query()->where('code', $code)->count();
        if ($CheckCode == 0) {
            $course_id = $request->input('course_id');
            $user = auth()->user();
            discount_code_course::create([
                'price_gift' => $price,
                'code' => $code,
                'user_id' => $user->id,
                'course_id' => json_encode($course_id)
            ]);
            return Response::success(true, "با موفقیت ثبت شد");
        } else {
            return Response::success(false, "این کد یکبار ثبت شده است");
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountRequest $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'price' => 'Required',
            'course_id.*' => 'Required',
            'code' => 'Required',
        ]);
        if ($validation->fails()) {

            return Response::errors(false, $validation->errors());

        } else {
            $price = $request->input('price');
            $course_id = $request->input('course_id');
            $code = $request->input('code');
            discount_code_course::where('id', $id)->update(['price_gift' => $price]);
            discount_code_course::where('id', $id)->update(['code' => $code]);
            if (isset($course_id)) {
                discount_code_course::where('id', $id)->update(['course_id' => json_encode($course_id)]);

            }

            return Response::success(true, "با موفقیت بروزرسانی شد");

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        discount_code_course::where('id', $id)->delete();
        return Response::success(true, "با موفقیت حذف شد");
    }
}
