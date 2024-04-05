<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Post\Database\Models\Post;


class StatusController extends Controller
{
    public function approve(Post $post)
    {
        $post->update(['status' => 'approved']);

        return back();
    }

    public function reject(Post $post)
    {
        $post->update(['status' => 'rejected']);

        return back();
    }
}
