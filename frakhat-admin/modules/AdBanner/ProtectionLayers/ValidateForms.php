<?php

namespace Modules\AdBanner\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['adBanner.store'])
            ->validate([
                'position'=>'required',
                'image' => 'required'

            ]);
        HeyMan::onCheckPoint(['adBanner.update'])
            ->validate([
                'position'=>'required',
                ]);

        HeyMan::onCheckPoint(['courseBanner.store'])
            ->validate([
                'position'=>'required|integer',
                'image' => 'required',
                'course_id' => 'required',
            ]);
        HeyMan::onCheckPoint(['courseBanner.update'])
            ->validate([
                'position'=>'required',
                'course_id' => 'required',
            ]);
    }
}
