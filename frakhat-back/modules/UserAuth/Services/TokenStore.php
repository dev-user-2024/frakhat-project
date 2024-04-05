<?php

namespace Modules\UserAuth\Services;

class TokenStore
{
    public function saveTokentResetPassword($token, $mobile)
    {
        $ttl = config('user_auth_config.token_ttl');
        cache()->set($token . '_user_auth_mobile', $mobile, $ttl);
    }
    public function getMobileByToken($token)
    {
        $mobile = cache()->get($token.'_user_auth_mobile');
        return nullable($mobile);
    }
    public function saveToken($token, $mobile)
    {
        $ttl = config('user_auth_config.token_ttl');
        cache()->set($token . '_user_auth', $mobile, $ttl);
    }

    public function getUidByToken($token)
    {
        $uid = cache()->pull($token.'_user_auth');
        return nullable($uid);
    }
}
