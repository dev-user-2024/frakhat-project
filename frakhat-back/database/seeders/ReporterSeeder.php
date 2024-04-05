<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ReporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'language-list',
            'language-create',
            'language-edit',
            'language-delete',
            'tag-list',
            'tag-create',
            'tag-edit',
            'tag-delete',
            'post-list',
            'post-create',
            'post-edit',
            'post-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
        ];

        foreach ($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }
        $user = User::create([
            'name' => 'مطهره',
            'family' => 'نثاری',
            'email' => 'mjann7697@gmail.com',
            'mobile' => '09199043027',
            'password' => bcrypt('123456')
        ]);
        $role = Role::where('name', 'reporter')->first();

        $permissions = Permission::whereIn('name', $permissions)
        ->pluck('id','id')->all();

        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);


    }
}
