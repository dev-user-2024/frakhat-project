<?php

namespace Modules\Video\Database;

use Illuminate\Support\Facades\File;
use Modules\Post\Database\Models\Post;
use Modules\Video\Database\Models\Video;

class VideoStore
{
    public static function install()
    {
        Post::created(function ($post) {
            if (request()->hasFile('videoable') && request()->file('videoable')->isValid()) {

                $file = request()->file('videoable');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $filePath = 'upload/videos/' . $fileName;
                $chunkSize = 1024 * 1024 * 2; // Chunk size (2MB)

                $publicPath = public_path('upload/videos/');
                $file->move($publicPath, $fileName);


                $video = new Video;
                $video->videoable_id = $post->id;
                $video->url = 'upload/videos/' . $fileName;
                $video->videoable_type = get_class($post);
                $video->save();

            }
        });

        Post::updated(function ($post) {
            // check if video has been uploaded
            if (request()->hasFile('videoable')) {

                if ($post->videos->first()->url) {
                    $filePath = $post->videos->first()->url;
                    $publicPath = public_path($filePath);

                    // Delete the video file
                    if (File::exists($publicPath)) {
                        File::delete($publicPath);
                    }
                }
                $post->videos->first()->delete();

                $file = request()->file('videoable');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $filePath = 'upload/videos/' . $fileName;
                $chunkSize = 1024 * 1024 * 2; // Chunk size (2MB)

                $publicPath = public_path('upload/videos/');
                $file->move($publicPath, $fileName);


                $video = new Video;
                $video->videoable_id = $post->id;
                $video->url = 'upload/videos/' . $fileName;
                $video->videoable_type = get_class($post);
                $video->save();

            }
        });

        Post::deleting(function ($post) {
            if ($post->videos->first()->url) {
                $filePath = $post->videos->first()->url;
                $publicPath = public_path($filePath);

                // Delete the video file
                if (File::exists($publicPath)) {
                    File::delete($publicPath);
                }
            }
            $post->videos->first()->delete();

        });
    }
}
