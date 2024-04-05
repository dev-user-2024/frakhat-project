<?php

namespace Modules\Language\Services;

use Modules\Language\Database\Models\Language;

class LanguageProvider
{
    public function getAllLanguages()
    {
        return  Language::query()->get();
    }

    public function getLanguageByid($id)
    {
        return Language::query()->find($id);
    }
}
