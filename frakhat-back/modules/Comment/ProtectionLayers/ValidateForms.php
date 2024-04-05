<?php

namespace Modules\Comment\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['comment.store'])
            ->validate(['title'=>'required', 'code' => 'required']);
        HeyMan::onCheckPoint(['comment.update'])
            ->validate(['title'=>'required', 'code' => 'required']);
    }
}
