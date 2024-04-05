<?php

namespace Modules\UserAuth\Http\Responses;

use Illuminate\Http\Response;

class ReactResponses
{
    public function userAlreadyRegistered()
    {
        return response()->json(
            ['status' => 'error', 'message' => 'شما قبلا ثبت نام کرده اید لطفا لاگین کنید!'], Response::HTTP_BAD_REQUEST
        );
    }
    public function userCanNotLogin()
    {
        return response()->json(
            ['status' => 'error', 'message' => 'شماره موبایل یا پسورد وارد شده اشتباه است !'], Response::HTTP_BAD_REQUEST
        );
    }
    public function dataNotValid($errors)
    {
        return response()->json(
            ['status' => 'error',
                'message' => 'مقادیر را به طور صحیح وارد نکرده اید لطفا دوباره تلاش کنید !',
                'errors' => $errors], Response::HTTP_BAD_REQUEST
        );
    }
    public function TokenIsValid($user)
    {
        return response()->json(
            ['status' => 'success',
                'message' => 'می توانید نام و خانواده خود را برای ثبت نام ارسال کنید.',
                'user' => $user], Response::HTTP_OK
        );
    }
    public function userAlreadyHasAccount($user)
    {
        return response()->json(
            ['status' => 'error',
                'message' => 'موبایل وارد شده قبلا ثبت شده است !',
                'user' => $user], Response::HTTP_BAD_REQUEST
        );
    }
    public function TokenNotFound()
    {
        return response()->json(
            ['status' => 'error', 'message' => 'توکن معتبر نیست!'], Response::HTTP_BAD_REQUEST
        );
    }
    public function LoggedIn($user)
    {
        return response()->json(
            ['status' => 'success',
                'message' => 'شما وارد شده اید.',
                'user' => $user], Response::HTTP_OK
        );
    }

    public function updateProfile($user)
    {
        return response()->json(
            ['status' => 'success',
                'message' => 'اطلاعات شما با موفقیت ذخیره شد.',
                'user' => $user], Response::HTTP_OK
        );
    }
    public function blockedUser()
    {
        return response()->json(
            ['status' => 'error', 'message' => 'شما مسدود شده اید!'], Response::HTTP_BAD_REQUEST
        );
    }

    public function tokenSent()
    {
        return response()->json(
            ['status' => 'success', 'message' => 'توکن ارسال شد.'], Response::HTTP_OK
        );
    }

    public function userNotFound()
    {
        return response()->json(
            ['status' => 'error', 'message' => 'لطفا ثبت نام کنید !'], Response::HTTP_BAD_REQUEST
        );
    }

    public function apiTokenWasNotValid()
    {
        return response()->json(
            ['status' => 'error', 'message' => 'خطای احراز هویت !'], Response::HTTP_BAD_REQUEST
        );
    }

    public function mobileNotValid()
    {
        return response()->json(
            ['status' => 'error', 'message' => 'موبایل معتبر نیست'], Response::HTTP_BAD_REQUEST
        );
    }

    public function youShouldBeGuest()
    {
        return response()->json(
            ['status' => 'error', 'message' => 'کاربر مهمان نیست!'], Response::HTTP_BAD_REQUEST
        );
    }

    public function unknownError()
    {
        return response()->json(
            ['status' => 'error', 'message' => 'بروز خطای ناشناخته! لطفا دوباره تلاش کنید.'], Response::HTTP_BAD_REQUEST
        );
    }
}
