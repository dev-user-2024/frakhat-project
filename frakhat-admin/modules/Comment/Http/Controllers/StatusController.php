<?php

namespace Modules\Comment\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Comment\Database\Models\Comment;


class StatusController extends Controller
{
    public function approve(Comment $comment)
    {
        $comment->update(['status' => 'approved']);

        return back();
    }

    public function reject(Comment $comment)
    {
        $comment->update(['status' => 'rejected']);

        return back();
    }
}
