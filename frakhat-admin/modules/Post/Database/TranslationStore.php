<?php

namespace Modules\Post\Database;

use Modules\Post\Database\Models\Post;
use Modules\Post\Database\Models\PostTranslation;
use Modules\Post\Facades\SlugProviderFacade;

class TranslationStore
{
    public static function install()
    {
        Post::created(function ($post) {
            foreach (request('languages') as $key => $value) {
                $slug = SlugProviderFacade::slugMaker($value['title']);
                $translation = new PostTranslation();
                $translation->language_id = $value['language_id'];
                $translation->post_id = $post->id;
                $translation->title = $value['title'];
                $translation->summary = $value['summary'];
                $translation->slug = $slug;
                $translation->content = $value['content'];
                $translation->save();
            }

        });
        Post::updated(function ($post) {
            foreach (request('languages') as $key => $value) {
                $slug = SlugProviderFacade::slugMaker($value['title']);
                $translation = PostTranslation::where('language_id', $value['language_id'])
                    ->where('post_id', $post->id)
                    ->firstOrNew();
                $translation->title = $value['title'];
                $translation->summary = $value['summary'];
                $translation->slug = $slug;
                $translation->content = $value['content'];
                $translation->save();
            }
        });

        Post::deleting(function ($post) {
            $post->postTranslations()->delete();
        });
    }
}
