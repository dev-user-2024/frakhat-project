<?php

namespace Modules\Category\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('category.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
