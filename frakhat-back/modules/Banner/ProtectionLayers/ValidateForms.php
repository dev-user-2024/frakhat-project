<?php

namespace Modules\Banner\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['banner.store'])
            ->validate([
                'title'=>'required',
                'description' => 'required',
                'discount_id' => 'required',
                'logo' => 'required',
                'image' => 'required'

            ]);
        HeyMan::onCheckPoint(['banner.update'])
            ->validate([
                'title'=>'required',
                'description' => 'required',
                'discount_id' => 'required',
                'logo' => 'required',
                'image' => 'required'
                ]);
    }
}
