<?php

namespace Modules\CategoryUser\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('categoryUser.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
