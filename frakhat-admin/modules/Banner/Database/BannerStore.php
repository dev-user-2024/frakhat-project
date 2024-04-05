<?php

namespace Modules\Banner\Database;

use app\Services\Uploader\ImageUploader;
use Imanghafoori\Helpers\Nullable;
use Modules\Banner\Database\Models\Banner;
use Illuminate\Support\Facades\File;

class BannerStore
{
    public static function store($data, $userId): Nullable
    {
        try {
            $image = ImageUploader::upload(request()->file('image'), 'banners/images', null, 800, 600, true);
            $logo = ImageUploader::upload(request()->file('logo'), 'banners/logos', null, 800, 600, true);

            $banner = Banner::query()->create([
                'user_id' => $userId,
                'title' => $data['title'],
                'description' => $data['description'],
                'discount_id' => $data['discount_id'],
                'image' => $image,
                'logo' => $logo,

            ]);
        } catch (\Exception $e) {
            return nullable();
        }

        if (! $banner->exists) {
            return nullable();
        }
        return nullable($banner);
    }
    public static function update($id, $data, $userId, $image = null, $logo = null)
    {
        try {
            $banner = Banner::findOrFail($id);
            if ($image && $logo) {
                $imagePath = ImageUploader::upload(request()->file('image'), 'banners/images', null, 800, 600, true);
                $logoPath = ImageUploader::upload(request()->file('logo'), 'banners/logos', null, 800, 600, true);
                self::destroyImage($banner->image);
                self::destroyImage($banner->logo);

            } else if ($image) {
                $imagePath = ImageUploader::upload(request()->file('image'), 'banners/images', null, 800, 600, true);
                self::destroyImage($banner->image);
                $logoPath = $banner->logo;
            } else if ($logo) {
                $logoPath = ImageUploader::upload(request()->file('logo'), 'banners/logos', null, 800, 600, true);
                self::destroyImage($banner->logo);
                $imagePath = $banner->image;
            } else {
                $imagePath = $banner->image;
                $logoPath = $banner->logo;
            }
            $banner->update([
                'user_id' => $userId,
                'title' => $data['title'],
                'description' => $data['description'],
                'discount_id' => $data['discount_id'],
                'image' => $imagePath,
                'logo' => $logoPath,
            ]);

        } catch (\Exception $e) {
            $response = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
            return nullable($response);
        }

        $response = [
            'status' => 'success',
            'message' => $banner
        ];
        return nullable($response);
    }


    public static function destroy($banner)
    {
        self::destroyImages($banner);
        $banner->delete();
    }


    public static function destroyImages($banner): void
    {
        if (File::exists(public_path($banner->image))) {
            File::delete(public_path($banner->image));
        }
        if (File::exists(public_path($banner->logo))) {
            File::delete(public_path($banner->logo));
        }
    }

    public static function destroyImage($image): void
    {
        if (File::exists(public_path($image))) {
            File::delete(public_path($image));
        }
    }
}
