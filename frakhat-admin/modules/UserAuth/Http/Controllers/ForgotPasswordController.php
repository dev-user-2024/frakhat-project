<?php

namespace Modules\UserAuth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\UserAuth\Facades\TokenGeneratorFacade;
use Modules\UserAuth\Facades\TokenSenderFacade;
use Modules\UserAuth\Facades\TokenStoreFacade;
use Modules\UserAuth\Facades\UserProviderFacade;
use Modules\UserAuth\Http\ResponderFacade;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function resetPassword()
    {
        // Validate data
        $this->validatePassword();

        $token = request('token');
        $mobile = TokenStoreFacade::getMobileByToken($token)->getOrSend(
            [ResponderFacade::class, 'TokenNotFound']
        );

        if ($mobile != request('mobile')) {
            return response()->json(['message' => 'Invalid user data.'], 422);
        }

        $user = User::where('mobile', $mobile)->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid mobile number.'], 422);
        }

        $user->password = Hash::make(request()->input('password'));
        $user->setRememberToken(Str::random(60)); // Regenerate remember token if applicable
        $user->save();

        return response()->json(['message' => 'Password reset successful.']);

    }
    public function forgotPassword()
    {
        $mobile = request('mobile');

        //validate data
        $this->validateDataIsValid();

        //if don't find user row in db send fail register
        $user = UserProviderFacade::getUserByMobileBeforRegister($mobile);
        if(! $user)
        {
            return ResponderFacade::userNotFound();
        }
        //generate token
        $token = TokenGeneratorFacade::generateToken();

        TokenStoreFacade::saveTokentResetPassword($token, $mobile);

        //send token
        TokenSenderFacade::send($token, $mobile);

        return ResponderFacade::tokenSent();

    }
    private function validateDataIsValid()
    {
        $validator = Validator::make(request()->all(), [
            'mobile' => ['required'],
        ]);
        if($validator->fails())
        {
            ResponderFacade::dataNotValid($validator->errors())->throwResponse();
        }
        return $validator;
    }
    private function validatePassword()
    {
        $validator = Validator::make(request()->all(), [
            'password' => 'required|min:6|confirmed',
            'token' => 'required',
        ]);
        if($validator->fails())
        {
            ResponderFacade::dataNotValid($validator->errors())->throwResponse();
        }
        return $validator;
    }
}
