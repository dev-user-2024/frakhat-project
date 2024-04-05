<?php

namespace Modules\UserDetail\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['userDetail.store'])
            ->validate([
                'name'=>'required',
                'family' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'mobile' => 'required|unique:users',

            ]);
        HeyMan::onCheckPoint(['userDetail.update'])
            ->validate([
                'name'=>'required',
                'family' => 'required',
                'email' => 'required|email|unique:users,email,'.request()->route('id'),
                'mobile' => 'required|unique:users,mobile,'.request()->route('id'),
            ]);
    }
}
