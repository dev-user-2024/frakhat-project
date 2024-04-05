<?php

namespace Modules\Category\Database;

use Imanghafoori\Helpers\Nullable;
use Imanghafoori\Middlewarize\Middlewarable;
use Modules\Category\Database\Models\Category;

class CategoryStore
{
    use Middlewarable;

    public static function store($data, $userId): Nullable
    {
        try {
            $category = Category::query()->create($data + ['user_id' => $userId]);
        } catch (\Exception $e) {
            return nullable(null);
        }

        if (! $category->exists) {
            return nullable(null);
        }
        return nullable($category);
    }
    public static function update($id, $data, $userId)
    {
        try {
            $status = Category::where('id', $id)
                ->update($data + ['user_id' => $userId]);
        } catch (\Exception $e) {
            return nullable(null);
        }
        return nullable($status);

    }

    public static function destroy($category)
    {
        try {
            $category->delete();
            return 'success';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
