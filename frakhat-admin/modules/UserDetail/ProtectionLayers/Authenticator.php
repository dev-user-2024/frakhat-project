<?php

namespace Modules\UserDetail\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('userDetail.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
