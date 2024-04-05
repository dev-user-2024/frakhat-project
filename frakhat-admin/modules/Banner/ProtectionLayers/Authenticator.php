<?php

namespace Modules\Banner\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('banner.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
