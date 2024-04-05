<?php

namespace Modules\ApiFront\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\ApiFront\Http\Resources\CategoryPostResource;
use Modules\ApiFront\Http\Resources\DetailPostResource;
use Modules\ApiFront\Http\Resources\LatestPostResource;
use Modules\ApiFront\Http\Resources\MenuResource;
use Modules\ApiFront\Http\Resources\PostResource;
use Modules\Category\Database\Models\Category;
use Modules\Like\Database\Models\Like;
use Modules\Menu\Database\Models\Menu;
use Modules\Menu\Database\Models\Section;
use Modules\Menu\Database\Models\Tab;
use Modules\Post\Database\Models\Post;

class PostLikeController extends Controller
{

    public function store($id)
    {
        $user = auth('sanctum')->user();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'خطای احراز هویت !'
            ], Response::HTTP_BAD_REQUEST);
        }

        $post = Post::findOrFail($id);

        if (!$this->userHasLikedPost($user->id, $post)) {
            $this->incrementPostLikes($post, $user->id);

            return response()->json([
                'status' => 'success',
                'message' => 'لایک شما با موفقیت انجام شد'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'شما قبلاً این پست را لایک کرده اید'
            ], 422);
        }
    }

    private function userHasLikedPost($userId, Post $post)
    {
        return $post->likes()->where('user_id', $userId)->exists();
    }

    private function incrementPostLikes(Post $post, $userId)
    {
        $post->increment('like_count');

        $like = new Like();
        $like->likeable_id = $post->id;
        $like->likeable_type = get_class($post);
        $like->user_id = $userId;
        $like->save();
    }


}
