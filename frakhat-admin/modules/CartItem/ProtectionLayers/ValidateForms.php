<?php

namespace Modules\CartItem\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['cartItem.store'])
            ->validate(['title'=>'required', 'code' => 'required']);
        HeyMan::onCheckPoint(['cartItem.update'])
            ->validate(['title'=>'required', 'code' => 'required']);
    }
}
