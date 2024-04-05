<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Menu\Database\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create section records using the section model
        $sections = [
            'Section 1',
            'Section 2',
            'Section 3',
            'Section 4',
            'Section 5',
            'Section 6',
            'Section 7',
            'Section 8',
        ];

        foreach ($sections as $section)
        {
            Section::create(['title' => $section]);
        }
    }
}
