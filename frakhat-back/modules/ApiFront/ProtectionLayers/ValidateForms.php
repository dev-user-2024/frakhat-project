<?php

namespace Modules\ApiFront\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['language.store'])
            ->validate(['title'=>'required', 'code' => 'required']);
        HeyMan::onCheckPoint(['language.update'])
            ->validate(['title'=>'required', 'code' => 'required']);
    }
}
