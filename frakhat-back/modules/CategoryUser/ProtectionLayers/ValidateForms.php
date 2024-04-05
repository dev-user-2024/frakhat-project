<?php

namespace Modules\CategoryUser\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['categoryUser.store'])
            ->validate([
                'user_id'=>'required',
                 'category_id' => 'required|array|min:1',
                'category_id.*' => 'required|integer',
            ]);
        HeyMan::onCheckPoint(['categoryUser.update'])
            ->validate([
                'user_id'=>'required',
                'category_id' => 'required|array|min:1',
                'category_id.*' => 'required|integer',
            ]);
    }
}
