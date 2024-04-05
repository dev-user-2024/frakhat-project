<?php

namespace Modules\Post\Services;

use Modules\Post\Database\Models\Post;

class PostProvider
{
    public function getPostsByType($type)
    {
        return  Post::where('type', $type)->get();
    }

    public function getPostByid($id)
    {
        return Post::query()->find($id);
    }
}
