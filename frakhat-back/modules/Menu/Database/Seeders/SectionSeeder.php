<?php

namespace Modules\Menu\Database\Seeders;

use Modules\Menu\Database\Models\Section;

class SectionSeeder
{
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
