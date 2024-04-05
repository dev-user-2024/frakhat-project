<?php

namespace Modules\UserAuth\Http\Controllers;

use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\UserAuth\Facades\AuthFacade;
use Modules\UserAuth\Facades\UserProviderFacade;
use Modules\UserAuth\Http\ResponderFacade;

class LoginController extends Controller
{
    public function userLogin()
    {
        //validate data
        $v = $this->validateDataIsValid();
        //validate user is guest
        $this->checkUserIsGuest();

        $userData = [
            'mobile' => request()->mobile,
            'password' => request()->password,
        ];

        //find user
        $user = UserProviderFacade::getUserByLoginData($userData)->getOrSend(
            [ResponderFacade::class, 'userCanNotLogin']
        );

        //stop block users for login
        if(UserProviderFacade::isBanned($user['id']))
        {
            return ResponderFacade::blockedUser();
        }

        //throttle the route

        //send response
        return ResponderFacade::LoggedIn($user);
    }

    private function validateDataIsValid()
    {
        $validator = Validator::make(request()->all(), [
            'mobile' => ['required'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        if($validator->fails())
        {
            ResponderFacade::dataNotValid($validator->errors())->throwResponse();
        }
        return $validator;
    }
    public function checkUserIsGuest()
    {
        if (AuthFacade::check()) {
            ResponderFacade::youShouldBeGuest()->throwResponse();
        }
    }

    public function logout() {
        if (auth('sanctum')->check()) {
            $user = auth('sanctum')->user();
            $user->tokens()->delete();

            return response()->json(['message' => 'شما با موفقیت از سیستم خارج شدید']);
        }

        return response()->json(['message' => 'شما احراز هویت نشده اید'], 401);
    }
}
