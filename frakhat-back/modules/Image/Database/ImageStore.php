<?php

namespace Modules\Image\Database;

use app\Services\Uploader\ImageUploader;
use Illuminate\Support\Facades\Storage;
use Modules\Post\Database\Models\Post;

class ImageStore
{
    public static function install()
    {
        Post::created(function ($post) {
            if (request()->hasFile('imageables')) {
                // Store the images in the images table
                foreach (request()->file('imageables') as $image) {
                    $url = ImageUploader::upload($image, 'posts/images/' . $post->type, null, 800, 600, true);
                    // Create the image record
                    $post->images()->create([
                        'imageable_id' => $post->id,
                        'imageable_type' => get_class($post),
                        'url' => $url,
                    ]);
                }
            }
        });
        Post::updating(function ($post) {
            if (request()->hasFile('imageables')) {
                // Delete old images and remove them from storage
                $post->images()->get()->each(function ($image) {
                    Storage::delete($image->url);
                    $image->delete();
                });

                // Store the new images in the images table
                foreach (request()->file('imageables') as $image) {
                    $url = ImageUploader::upload($image, 'posts/images/' . $post->type, null, 800, 600, true);
                    // Create the image record
                    $post->images()->create([
                        'imageable_id' => $post->id,
                        'imageable_type' => get_class($post),
                        'url' => $url,
                    ]);
                }
            }
        });

        Post::deleting(function ($post) {
            // Delete the associated images and remove them from storage
            $post->images()->get()->each(function ($image) {
                Storage::delete($image->url);
                $image->delete();
            });
        });
    }
}
