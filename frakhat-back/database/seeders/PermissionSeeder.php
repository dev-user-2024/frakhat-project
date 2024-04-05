<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
            'all-permission',
            'user profile',
            'trachoneshs',
            'orders',
            'news list admin',
            'news edit',
            'news list',
            'news create',
            'discount list',
            'discount edit',
            'discount create',
            'course edit',
            'course list',
            'course create',
            'category course edit',
            'category course create',
            'category course list',
            'page edit',
            'page create',
            'page list',
            'gallery list',
            'gallery create',
            'social edit',
            'social list',
            'setting list',
            'user create',
            'user list',
            'admin list',
            'reporter list',
            'category news edit',
            'category news create',
            'category news list',
            'admin panel',
        ];

        foreach ($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }
    }
}
