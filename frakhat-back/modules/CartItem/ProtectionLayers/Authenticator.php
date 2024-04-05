<?php

namespace Modules\CartItem\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class Authenticator
{
    public static function install()
    {
        HeyMan::onRoute('cartItem.*')
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');
    }
}
