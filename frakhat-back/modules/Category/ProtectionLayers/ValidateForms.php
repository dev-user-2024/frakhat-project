<?php

namespace Modules\Category\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['category.store'])
            ->validate(['languages.*.title'=>'required', 'parent_id' => 'required']);
        HeyMan::onCheckPoint(['category.update'])
            ->validate(['languages.*.title'=>'required', 'parent_id' => 'required']);
    }
}
