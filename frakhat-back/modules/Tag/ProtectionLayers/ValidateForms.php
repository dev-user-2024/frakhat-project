<?php

namespace Modules\Tag\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['tag.store'])
            ->validate(['languages.*.title'=>'required']);
        HeyMan::onCheckPoint(['tag.update'])
            ->validate(['languages.*.title'=>'required']);
    }
}
