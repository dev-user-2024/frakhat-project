<?php

namespace Modules\Comment\Services;

use Modules\Comment\Database\Models\Comment;

class CommentProvider
{
    public function getAllCommentsByType($type)
    {
        $class = 'App\\Models\\' . ucfirst($type); // Assuming your models are in the App\Models namespace
        return Comment::where('commentable_type', $class)->get();
    }
    public function getAllComments()
    {
        return  Comment::query()->get();
    }

    public function getCommentByid($id)
    {
        return Comment::query()->find($id);
    }
}
