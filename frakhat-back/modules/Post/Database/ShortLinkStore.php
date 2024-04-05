<?php

namespace Modules\Post\Database;

use Modules\Post\Database\Models\Post;

class ShortLinkStore
{
    public static function install()
    {
        Post::creating(function ($post) {
            $latestNews = Post::orderBy('id', 'desc')->first();
            $code = $latestNews ? $latestNews->code + 1 : 1000;
//            $post->url = route('posts.show', $post->id);
            $post->url = url('api/homepage/single_news/' . $post->id);
            $post->short_link = Post::generateShortLink();
            $post->code = $code;

        });
    }
}
