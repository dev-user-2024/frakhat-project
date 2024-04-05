<?php

namespace Modules\Tag\Database;

use Imanghafoori\Helpers\Nullable;
use Modules\Tag\Database\Models\Tag;
use Modules\Tag\Database\Models\TagTranslation;
use Modules\Tag\Facades\SlugProviderFacade;

class TagStore
{
    public static function store($data, $userId): Nullable
    {
        try {
            $tag = Tag::query()->create(['user_id' => $userId]);
            self::storeTranslations($data['languages'], $tag);

        } catch (\Exception $e) {
            return nullable();
        }

        if (! $tag->exists) {
            return nullable();
        }
        return nullable($tag);
    }
    public static function update($id, $data, $userId)
    {
        $tag = Tag::findOrFail($id);
        $tag->where('id', $id)->update(['user_id' => $userId]);
        self::updateTranslations($data['languages'], $tag);
        return $tag;

    }

    public static function destroy($tag)
    {
        $tag->delete();
    }

    public static function storeTranslations($languages, $tag): void
    {
        foreach ($languages as $key => $value) {
            $slug = SlugProviderFacade::slugMaker($value['title']);
            $translation = new TagTranslation();
            $translation->language_id = $value['language_id'];
            $translation->tag_id = $tag->id;
            $translation->title = $value['title'];
            $translation->slug = $slug;
            $translation->save();
        }
    }
    public static function updateTranslations($languages, $tag): void
    {
        foreach ($languages as $translation) {
            $tag->tagTranslations()
                ->where('language_id', $translation['language_id'])
                ->update([
                    'title' => $translation['title'],
                    'slug' => SlugProviderFacade::slugMaker($translation['title'])
                ]);
        }
    }
}
