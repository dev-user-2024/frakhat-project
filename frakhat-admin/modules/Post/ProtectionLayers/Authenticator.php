<?php

namespace Modules\Post\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('post.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
