<?php

namespace Modules\Discount\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('discount.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
