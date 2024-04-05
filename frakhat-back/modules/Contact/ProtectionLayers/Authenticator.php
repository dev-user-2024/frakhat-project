<?php

namespace Modules\Contact\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('contact.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
