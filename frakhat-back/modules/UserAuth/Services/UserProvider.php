<?php

namespace Modules\UserAuth\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserProvider
{
    public function getUserByLoginData($data)
    {
        if (!auth()->attempt(['mobile' => $data['mobile'], 'password' => $data['password']])) {
            return nullable(null);
        }
        $user = auth()->user();
        $token = $user->createToken('authToken')->plainTextToken;
        $user = [
            'id' => $user->id,
            'api_token' => $token,
            'name' => $user->name,
            'family' => $user->family,
            'mobile' => $user->mobile,
        ];
        return nullable($user);
    }
    public function getUserByData($key, $value)
    {
        $user = User::where($key, $value)->first();
        return nullable($user);
    }

    public function getUserByMobileBeforRegister($mobile)
    {
        return User::where('mobile', $mobile)->first();
    }

    public function isBanned($userId)
    {
        $user = User::find($userId) ?: new User;
        return $user->is_ban == 1 ? true : false;
    }
}
