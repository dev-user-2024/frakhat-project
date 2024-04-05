<?php

namespace Modules\Contact\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['contact.store'])
            ->validate(['title'=>'required', 'code' => 'required']);
        HeyMan::onCheckPoint(['contact.update'])
            ->validate(['title'=>'required', 'code' => 'required']);
    }
}
