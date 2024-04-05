<?php

namespace Modules\AdBanner\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('adBanner.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
