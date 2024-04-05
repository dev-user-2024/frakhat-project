<?php

namespace Modules\Menu\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('menu.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
