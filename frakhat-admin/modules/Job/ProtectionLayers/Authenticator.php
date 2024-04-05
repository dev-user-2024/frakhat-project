<?php

namespace Modules\Job\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('job.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
