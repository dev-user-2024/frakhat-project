<?php

namespace Modules\TeachingRequest\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('teachingRequest.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
