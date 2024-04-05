<?php

namespace Modules\ApiFront\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Modules\Post\Database\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PostViewController extends Controller
{


    public function store($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->increment('view_count');
            return response()->json(['status' => 'success']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['status' => 'error', 'message' => 'پست مورد نظر یافت نشد'], Response::HTTP_NOT_FOUND);
        } catch (QueryException $e) {
            return response()->json(['status' => 'error', 'message' => 'خطای دیتابیس در هنگام ثبت اطلاعات'], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'خطای ناشناخته رخ داده است'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



}
