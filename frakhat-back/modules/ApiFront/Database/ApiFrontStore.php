<?php

namespace Modules\ApiFront\Database;

use Imanghafoori\Helpers\Nullable;
use Modules\ApiFront\Database\Models\ApiFront;

class ApiFrontStore
{
    public static function store($data, $userId): Nullable
    {
        try {
            $language = ApiFront::query()->create($data + ['user_id' => $userId]);
        } catch (\Exception $e) {
            return nullable();
        }

        if (! $language->exists) {
            return nullable();
        }
        return nullable($language);
    }
    public static function update($id, $data, $userId)
    {
        return ApiFront::where('id', $id)
            ->update($data + ['user_id' => $userId]);
    }

    public static function destroy($language)
    {
        $language->delete();
    }
}
