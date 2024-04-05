<?php

namespace Modules\Category\Database;

use Modules\Category\Database\Models\Category;
use Modules\Post\Database\Models\Post;

class CategoryableStore
{
    public static function install()
    {
        Post::created(function ($post) {
            if (!empty(request('category_id'))) {
                $categories = Category::whereIn('id', request('category_id'))->get();
                $post->categories()->attach($categories);
            }
        });
        Post::updated(function ($post) {
            if (!empty(request('category_id'))) {
                $categories = Category::whereIn('id', request('category_id'))->get();
                $post->categories()->sync($categories);
            } else {
                $post->categories()->detach();
            }
        });
        Post::deleting(function ($post) {
            $post->categories()->detach();
        });
    }
}
