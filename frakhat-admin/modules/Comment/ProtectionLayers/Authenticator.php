<?php

namespace Modules\Comment\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('comment.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
