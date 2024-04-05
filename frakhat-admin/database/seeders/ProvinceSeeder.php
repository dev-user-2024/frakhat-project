<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            'آذربایجان شرقی',
            'آذربایجان غربی',
            'اردبیل',
            'اصفهان',
            'البرز',
            'ایلام',
            'بوشهر',
            'تهران',
            'چهار محال و بختیاری',
            'خراسان جنوبی',
            'خراسان رضوی',
            'خراسان شمالی',
            'خوزستان',
            'زنجان',
            'سمنان',
            'سیستان و بلوچستان',
            'فارس',
            'قزوین',
            'قم',
            'کردستان',
            'کرمان',
            'کرمانشاه',
            'کهگیلویه و بویراحمد',
            'گلستان',
            'گیلان',
            'لرستان',
            'مازندران',
            'مرکزی',
            'هرمزگان',
            'همدان',
            'یزد',
        ];

        foreach ($provinces as $item)
        {
            Province::create(['title' => $item]);
        }
    }
}
