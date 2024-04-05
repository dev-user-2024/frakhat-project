<?php

namespace Modules\Language\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('language.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
