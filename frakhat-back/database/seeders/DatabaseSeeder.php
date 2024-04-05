<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Job\Database\Seeders\JobGroupSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        $this->call(PermissionSeeder::class);
//        $this->call(RoleSeeder::class);
//        $this->call(AdminSeeder::class);
//        $this->call(ReporterSeeder::class);
//        $this->call(LanguageSeeder::class);
//        $this->call(SectionSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(JobGroupSeeder::class);





    }
}
