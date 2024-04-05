<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'super-admin',
            'email' => 'admin@gmail.com',
            'mobile' => '09330945684',
            'password' => bcrypt('123456')
        ]);
        $role = Role::find(1);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $roles = Role::pluck('id','id')->all();
        $user->syncRoles($roles);

    }
}
