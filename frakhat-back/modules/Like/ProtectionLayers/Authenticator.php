<?php

namespace Modules\Like\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('like.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
