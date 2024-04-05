<?php

namespace Modules\Category\Database;

use Modules\Category\Database\Models\Category;
use Modules\Category\Database\Models\CategoryTranslation;
use Modules\Post\Facades\SlugProviderFacade;

class TranslationStore
{
    public static function install()
    {
        Category::created(function ($model) {
            foreach (request('languages') as $key => $value) {
                $slug = SlugProviderFacade::slugMaker($value['title']);
                $translation = new CategoryTranslation();
                $translation->language_id = $value['language_id'];
                $translation->category_id = $model->id;
                $translation->title = $value['title'];
                $translation->slug = $slug;
                $translation->save();
            }
        });

        Category::updating(function ($model) {
            foreach (request('languages') as $key => $value) {
                $slug = SlugProviderFacade::slugMaker($value['title']);
                $translation = CategoryTranslation::where('category_id', $model->id)
                    ->where('language_id', $value['language_id'])
                    ->firstOrNew();
                $translation->title = $value['title'];
                $translation->slug = $slug;
                $translation->save();
            }
        });

        Category::deleting(function ($model) {
            $model->categoryTranslations()->delete();
        });
    }
}
