<?php

namespace Modules\Language\Database;

use Imanghafoori\Helpers\Nullable;
use Modules\Language\Database\Models\Language;

class LanguageStore
{
    public static function store($data, $userId): Nullable
    {
        try {
            $language = Language::query()->create($data + ['user_id' => $userId]);
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
        return Language::where('id', $id)
            ->update($data + ['user_id' => $userId]);
    }

    public static function destroy($language)
    {
        $language->delete();
    }
}
