<?php

namespace Modules\Discount\Database;

use Imanghafoori\Helpers\Nullable;
use Modules\Discount\Database\Models\Discount;
use Modules\Discount\Database\Models\DiscountMarketer;
use Illuminate\Support\Str;
class DiscountStore
{
    public static function store($data, $userId): Nullable
    {
        try {

            if($data['type'] == 'course_category')
            {
                $discount = Discount::find($data['discount_marketer_id']);
                $data = [
                    'code' => $data['code'],
                    'maxOfPrice' => $data['maxOfPrice'],
                    'maxOfUser' => $data['maxOfUser'],
                    'maker' => 'marketer',
                ];
                $discount->update($data + ['user_id' => $userId]);
            } elseif ($data['type'] == 'course'){
                $data = [
                    'code' => $data['code'],
                    'maxOfPrice' => $data['maxOfPrice'],
                    'maxOfUser' => $data['maxOfUser'],
                    'maker' => 'admin',
                    'type' => 'course',
                    'user_id' => $userId,
                    'type_id' => $data['course_id'],
                    'maxOfMarketer' => $data['maxOfMarketer'],
                    'percent' => $data['percent'],
                ];
                $discount = Discount::query()->create($data);
            }

        } catch (\Exception $e) {
            return nullable();
        }

        if (! $discount->exists) {
            return nullable();
        }
        return nullable($discount);
    }

    public static function storeMarketer($data, $userId): Nullable
    {
        try {
            $data = [
                'type' => 'course_category',
                'user_id' => $userId,
                'type_id' => $data['course_category_id'],
                'maxOfMarketer' => $data['maxOfMarketer'],
                'percent' => $data['percent'],
            ];
            $discount = Discount::query()->create($data);
        } catch (\Exception $e) {
            return nullable();
        }

        if (! $discount->exists) {
            return nullable();
        }
        return nullable($discount);
    }

}
