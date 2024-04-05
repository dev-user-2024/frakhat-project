<?php

namespace Modules\Tag\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('tag.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
