<?php

namespace Modules\ApiFront\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Modules\Comment\Database\Models\Comment;
use Modules\Post\Database\Models\Post;
use Illuminate\Support\Facades\Validator;


class CommentController extends Controller
{


    public function store($post_id)
    {
        $user = auth('sanctum')->user();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'خطای احراز هویت !'
            ], Response::HTTP_BAD_REQUEST);
        }
        $validator = Validator::make(request()->all(), [
            'body' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $post = Post::find($post_id);
        if (!$post) {
            return response()->json(['status' => 'error', 'message' => 'پست مورد نظر یافت نشد'], Response::HTTP_NOT_FOUND);
        }

        $comment = new Comment([
            'body' => request()->input('body'),
            'user_id' => $user->id,
        ]);
        $post->comments()->save($comment);

        return response()->json(['status' => 'success', 'comment' => $comment]);
    }

    public function index($post_id)
    {
        try {
            $post = Post::findOrFail($post_id);
            $comments = $post->comments()->with('user')->orderBy('created_at', 'desc')->get();

            return response()->json(['status' => 'success', 'comments' => $comments]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'خطای ناشناخته رخ داده است'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
