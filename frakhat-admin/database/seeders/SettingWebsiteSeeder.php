<?php

namespace Database\Seeders;

use App\Models\setting_website;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingWebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        setting_website::create([
            'title_website' => 'فراخط',
            'copyright_website' => '@2022',
            'logo_website' => 'panelStyle/app-assets/logo/logo.png',
            'favicon_website' => 'panelStyle/app-assets/ico/favicon.ico',
            'about_me' => 'این توضیحات درباره ما پیش فرض وب سایت فراخط میباشد شما میتوانید آن را شخصی سازی کنید:)',
        ]);
    }
}
