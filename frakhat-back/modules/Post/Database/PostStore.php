<?php

namespace Modules\Post\Database;

use App\Services\Uploader\ImageUploader;
use Illuminate\Support\Facades\Storage;
use Imanghafoori\Helpers\Nullable;
use Imanghafoori\Middlewarize\Middlewarable;
use Modules\Post\Database\Models\Post;

class PostStore
{
    use Middlewarable;
    public static function store($data, $userId,$image): Nullable
    {
        try {
            //upload image
            $image = ImageUploader::upload(request()->file('image'), 'posts/images/' . $data['type'], null, 800, 600, true);


            $post = Post::query()->create([
                'user_id' => $userId,
                'type' => $data['type'],
                'image' => $image
            ]);

        } catch (\Exception $e) {
            $response = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
            return nullable($response);
        }

        if (! $post->exists) {
            $response = [
                'status' => 'error',
                'message' => 'Failed to create post.'
            ];
            return nullable($response);
        }
        $response = [
            'status' => 'success',
            'message' => $post
        ];
        return nullable($response);
    }
    public static function update($id, $data, $userId, $image=null)
    {
        try {
            $post = Post::findOrFail($id);
            if ($image)
            {
                $image = ImageUploader::upload(request()->file('image'), 'posts/images/' . $post->type, null, 800, 600, true);
                Storage::delete($post->image);
                $post->update([
                    'user_id' => $userId,
                    'type' => $data['type'],
                    'image' => $image
                ]);
            }
            else {
                $post->update([
                    'user_id' => $userId,
                    'type' => $data['type'],
                ]);
            }

        } catch (\Exception $e){
            $response = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
            return nullable($response);
        }

        $response = [
            'status' => 'success',
            'message' => $post
        ];
        return nullable($response);

    }

    public static function destroy($post)
    {
        $post->delete();
    }

}
