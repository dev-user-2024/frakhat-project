<?php

namespace Modules\Menu\Database;

use Imanghafoori\Helpers\Nullable;
use Modules\Menu\Database\Models\Menu;
use Modules\Menu\Database\Models\Tab;

class MenuStore
{
    public static function store($data, $userId): Nullable
    {
        try {
            $menu = Menu::query()->create($data + ['user_id' => $userId]);
        } catch (\Exception $e) {
            return nullable();
        }

        if (! $menu->exists) {
            return nullable();
        }
        return nullable($menu);
    }
    public static function storeTab($data, $userId): Nullable
    {
        try {
            $menu = Tab::query()->create($data + ['user_id' => $userId]);
        } catch (\Exception $e) {
            return nullable();
        }

        if (! $menu->exists) {
            return nullable();
        }
        return nullable($menu);
    }
    public static function update($id, $data, $userId)
    {
        return Menu::where('id', $id)
            ->update($data + ['user_id' => $userId]);
    }
    public static function updateTab($id, $data)
    {
        return Tab::where('id', $id);
    }

    public static function destroy($menu)
    {
        $menu->delete();
    }
}
