<?php

namespace App\Services\Uploader;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageUploader
{
    /**
     * Upload an image file to the specified directory and return the file path.
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param string|null $filename
     * @param int $width
     * @param int $height
     * @param bool $crop
     * @return string
     */
    public static function upload(UploadedFile $file, string $directory , string $filename = null, int $width = 0, int $height = 0, bool $crop = false): string
    {
        // Generate a unique filename if none is provided
        if (!$filename) {
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        }

        // Resize the image if requested
        $image = Image::make($file);
        if ($width > 0 && $height > 0) {
            if ($crop) {
                $image->fit($width, $height);
            } else {
                $image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }
        }


        $publicPath = public_path('upload/' .$directory);
        $file->move($publicPath, $filename);

        return 'upload/' .$directory . '/' . $filename;

    }
}
