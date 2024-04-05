<?php

namespace Modules\CategoryUser\Services;

use App\Models\User;
use Modules\CategoryUser\Database\Models\CategoryUser;

class CategoryUserProvider
{
    public function getAllReporter()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'reporter');
        })->get();
    }
    public function getAllCategoryUsers()
    {
        return User::has('categoryUsers')->with('categoryUsers')->get();
    }

    public function getCategoryUserByUserId($id)
    {
        return User::with('categoryUsers')->find($id);

    }
}
