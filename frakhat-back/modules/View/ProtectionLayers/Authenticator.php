<?php

namespace Modules\View\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('view.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
