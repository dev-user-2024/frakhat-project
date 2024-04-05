<?php

namespace Modules\TeachingRequest\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['teachingRequest.store'])
            ->validate(['subject'=>'required', 'message' => 'required']);

    }
}
