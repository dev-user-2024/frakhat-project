<?php

namespace Modules\Tag\Services;

class SlugProvider
{
    public function slugMaker($title)
    {
        $title = trim($title);
        $title = mb_strtolower($title, 'UTF-8');
        $separator = '-';
        $title = str_replace('‌', $separator, $title);

        $title = preg_replace(
            '/[^a-z0-9_\s\-اآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوةيإأۀءهی۰۱۲۳۴۵۶۷۸۹٠١٢٣٤٥٦٧٨٩]/u',
            '',
            $title
        );

        $title = preg_replace('/[\s\-_]+/', ' ', $title);
        $title = preg_replace('/[\s_]/', $separator, $title);
        return trim($title, $separator);
    }
}
