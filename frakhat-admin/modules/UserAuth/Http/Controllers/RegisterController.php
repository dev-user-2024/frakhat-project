<?php

namespace Modules\UserAuth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Modules\UserAuth\Facades\AuthFacade;
use Modules\UserAuth\Facades\UserProviderFacade;
use Modules\UserAuth\Http\ResponderFacade;

class RegisterController extends Controller
{
    public function updateUser()
    {
//        $this->validateDataIsValid();

        if (auth('sanctum')->check()) {
            $user = Auth::guard('sanctum')->user();
            $data = $this->prepareData();

            $value =AuthFacade::updateUserInRegister($data, $user)->getOrSend(
                [ResponderFacade::class, 'unknownError']
            );

            if ($value['status'] == 'success') {
                return ResponderFacade::updateProfile($value['data']);
            } else {
                return ResponderFacade::dataNotValid($value['data']);
            }

        }
        return ResponderFacade::apiTokenWasNotValid();

    }
    private function validateDataIsValid()
    {
        $validator = Validator::make(request()->all(), [
            'name' => ['string', 'max:255'],
            'family' => ['string', 'max:255'],
            'email' => ['email'],
            'password' => ['string', 'min:6'],
            'city' => ['string'],
            'tell' => ['string'],
            'birth_day' => ['string'],
            'national_code' => ['string'],

        ]);
        if($validator->fails())
        {
            ResponderFacade::dataNotValid($validator->errors())->throwResponse();
        }
    }

    public function prepareData(): array
    {
        $data = [
            'name' => request()->name,
            'family' => request()->family,
            'email' => request()->email,
            'city' => request()->city,
            'tell' => request()->tell,
            'birth_day' => request()->birth_day,
            'national_code' => request()->national_code,
            'password' => request()->password,
            'image' => request()->image,
        ];
        return $data;
    }
}
