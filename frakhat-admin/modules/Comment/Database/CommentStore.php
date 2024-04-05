<?php

namespace Modules\Comment\Database;

class CommentStore
{
    public static function destroy($comment)
    {
        $comment->delete();
    }
}
