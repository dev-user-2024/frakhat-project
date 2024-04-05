<?php

namespace Modules\CategoryUser\Database;

use Illuminate\Support\Facades\DB;
use Imanghafoori\Helpers\Nullable;
use Modules\CategoryUser\Database\Models\CategoryUser;

class CategoryUserStore
{

    public static function store($data): Nullable
    {
        DB::beginTransaction();

        try {
            $userId = $data['user_id'];
            // Delete existing CategoryUser records for the given user
            CategoryUser::query()
                ->where('user_id', $userId)
                ->delete();

            // Create new CategoryUser records for the updated category_id values
            $categoryIds = $data['category_id'];
            foreach ($categoryIds as $categoryId) {
                $categoryUser = CategoryUser::query()->create([
                    'category_id' => $categoryId,
                    'user_id' => $userId,
                ]);
                if (!$categoryUser->exists) {
                    DB::rollback();
                    return nullable();
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            return nullable();
        }

        DB::commit();
        return nullable(true);
    }


    public static function destroy($userId)
    {
        CategoryUser::query()
            ->where('user_id', $userId)
            ->delete();
    }
}
