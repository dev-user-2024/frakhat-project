<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'manager',
            'user',
            'reporter',
            'marketer',
            'teacher',
        ];

        foreach ($roles as $role)
        {
            Role::create(['name' => $role]);
        }
    }
}
