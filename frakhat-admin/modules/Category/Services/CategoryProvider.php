<?php

namespace Modules\Category\Services;

use Modules\Category\Database\Models\Category;

class CategoryProvider
{
    public function getCategoriesByStringType($type)
    {
        return  Category::where('categoryable_type', $type)->get();
    }

    public function getCategoryByid($id)
    {
        return Category::query()->find($id);
    }
}
