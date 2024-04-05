<?php

namespace Modules\Menu\Services;

use Modules\Menu\Database\Models\Menu;
use Modules\Menu\Database\Models\Section;
use Modules\Menu\Database\Models\Tab;

class MenuProvider
{
    public function getAllMenus()
    {
        return  Menu::query()->get();
    }
    public function getAllSections()
    {
        return  Section::query()->get();
    }

    public function getAllTabs()
    {
        return  Tab::query()->get();
    }

    public function getMenuByid($id)
    {
        return Menu::query()->find($id);
    }
    public function getTabByid($id)
    {
        return Tab::query()->find($id);
    }
}
