<?php

namespace Modules\UserDetail\Services;

use App\Models\User;

class UserDetailProvider
{
    public function getAllUsersbyRole($role)
    {
        return User::role($role)->get();
    }

    public function getUserByid($id)
    {
        return User::query()->find($id);
    }
}
