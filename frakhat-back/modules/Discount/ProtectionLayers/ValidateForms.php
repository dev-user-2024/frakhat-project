<?php

namespace Modules\Discount\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForms
{
    public static function install()
    {
        HeyMan::onCheckPoint(['discount.store'])
            ->validate([
//                'discount_marketer_id'=>'required',
                'maxOfPrice' => 'required',
                'maxOfUser' => 'required',
                'code' => 'required|unique:discounts',
            ]);

        HeyMan::onCheckPoint(['discount.marketer.store'])
            ->validate([
                'course_category_id'=>'required',
                'percent' => 'required',
                'maxOfMarketer' => 'required'
            ]);
    }
}
