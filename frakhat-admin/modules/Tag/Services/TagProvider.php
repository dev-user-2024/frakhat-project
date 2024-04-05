<?php

namespace Modules\Tag\Services;

use Modules\Tag\Database\Models\Tag;

class TagProvider
{
    public function getAllTags()
    {
        return  Tag::query()->get();
    }

    public function getTagByid($id)
    {
        return Tag::query()->find($id);
    }
    public function getTagWithTranslationByid($id)
    {
        return Tag::with('tagTranslations')
            ->findOrFail($id);
    }
}
