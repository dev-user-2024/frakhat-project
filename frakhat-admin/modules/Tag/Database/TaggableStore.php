<?php

namespace Modules\Tag\Database;

use Modules\Job\Database\Models\Job;
use Modules\Post\Database\Models\Post;
use Modules\Tag\Database\Models\Tag;

class TaggableStore
{
    public static function install()
    {
        Post::created(function ($post) {
            if (!empty(request('tag_id'))) {
                $tags = Tag::whereIn('id', request('tag_id'))->get();
                $post->tags()->attach($tags);
            }
        });
        Post::updated(function ($post) {
            if (!empty(request('tag_id'))) {
                $categories = Tag::whereIn('id', request('tag_id'))->get();
                $post->tags()->sync($categories);
            } else {
                $post->tags()->detach();
            }
        });
        Post::deleting(function ($post) {
            $post->tags()->detach();

        });

        Job::created(function ($post) {
            if (!empty(request('tag_id'))) {
                $tags = Tag::whereIn('id', request('tag_id'))->get();
                $post->tags()->attach($tags);
            }
        });
        Job::updated(function ($post) {
            if (!empty(request('tag_id'))) {
                $categories = Tag::whereIn('id', request('tag_id'))->get();
                $post->tags()->sync($categories);
            } else {
                $post->tags()->detach();
            }
        });
        Job::deleting(function ($post) {
            $post->tags()->detach();

        });
    }
}
