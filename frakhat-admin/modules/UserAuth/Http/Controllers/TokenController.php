<?php

namespace Modules\UserAuth\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\UserAuth\Facades\AuthFacade;
use Modules\UserAuth\Facades\TokenGeneratorFacade;
use Modules\UserAuth\Facades\TokenSenderFacade;
use Modules\UserAuth\Facades\TokenStoreFacade;
use Modules\UserAuth\Facades\UserProviderFacade;
use Modules\UserAuth\Http\ResponderFacade;
use Illuminate\Support\Facades\Validator;


class TokenController extends Controller
{
    public function checkToken()
    {
        $token = request('token');
        $mobile = TokenStoreFacade::getUidByToken($token, '_user_auth')->getOrSend(
            [ResponderFacade::class, 'TokenNotFound']
        );
        //create user
        $data =AuthFacade::createUserByMobile($mobile);
        return ResponderFacade::TokenIsValid($data);
    }
    public function issueToken()
    {
        $mobile = request('mobile');
        //validate mobile
        $this->validateMobileIsValid();
        //validate user is guest
        $this->checkUserIsGuest();
        //if find user row in db send fail register
        $user = UserProviderFacade::getUserByMobileBeforRegister($mobile);
        if($user)
        {
            $data = [
                'id' => $user->id,
                'mobile' => $user->mobile,
                'api_token' => $user->createToken('authToken')->plainTextToken
            ];
            return ResponderFacade::userAlreadyHasAccount($data);
        }
        //generate token
        $token = TokenGeneratorFacade::generateToken();
        //save token in cache
        TokenStoreFacade::saveToken($token, $mobile);
        //send token
        TokenSenderFacade::send($token, $mobile);
        //send response
        return ResponderFacade::tokenSent();
    }

    private function validateMobileIsValid()
    {
        $v = Validator::make(request()->all(), ['mobile' => 'required']);
        if($v->fails())
        {
            ResponderFacade::mobileNotValid()->throwResponse();
        }
    }

    public function checkUserIsGuest()
    {
        if (AuthFacade::check()) {
            ResponderFacade::youShouldBeGuest()->throwResponse();
        }
    }

}
