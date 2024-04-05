<?php

namespace Modules\AdBanner\Database;

use App\Services\Uploader\ImageUploader;
use Imanghafoori\Helpers\Nullable;
use Modules\AdBanner\Database\Models\AdBanner;
use Illuminate\Support\Facades\File;
use Modules\AdBanner\Database\Models\CourseBanner;

class AdBannerStore
{
    public static function store($data, $userId): Nullable
    {
        try {
            $image = ImageUploader::upload(request()->file('image'), 'adBanners/images', null, 800, 600, true);

            $adBanner = AdBanner::query()->create([
                'user_id' => $userId,
                'position' => $data['position'],
                'image' => $image,
                'link' => $data['link'],

            ]);
        } catch (\Exception $e) {
            return nullable();
        }

        if (! $adBanner->exists) {
            return nullable();
        }
        return nullable($adBanner);
    }
    public static function update($id, $data, $userId, $image = null)
    {
        try {
            $adBanner = AdBanner::findOrFail($id);
            if ($image) {
                $imagePath = ImageUploader::upload(request()->file('image'), 'adBanners/images', null, 800, 600, true);
                self::destroyImage($adBanner->image);

            } else {
                $imagePath = $adBanner->image;
            }
            $adBanner->update([
                'user_id' => $userId,
                'position' => $data['position'],
                'image' => $imagePath,
                'link' => $data['link'],
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
            'message' => $adBanner
        ];
        return nullable($response);
    }
    public static function destroy($adBanner)
    {
        self::destroyImages($adBanner);
        $adBanner->delete();
    }

    public static function storeCourse($data, $userId): Nullable
    {
        try {
            $image = ImageUploader::upload(request()->file('image'), 'courseBanners/images', null, 800, 600, true);

            $adBanner = CourseBanner::query()->create([
                'user_id' => $userId,
                'position' => $data['position'],
                'image' => $image,
                'link' => $data['link'],
                'course_id' => $data['course_id'],

            ]);
        } catch (\Exception $e) {
            return nullable();
        }

        if (! $adBanner->exists) {
            return nullable();
        }
        return nullable($adBanner);
    }
    public static function updateCourse($id, $data, $userId, $image = null)
    {
        try {
            $adBanner = CourseBanner::findOrFail($id);
            if ($image) {
                $imagePath = ImageUploader::upload(request()->file('image'), 'courseBanners/images', null, 800, 600, true);
                self::destroyImage($adBanner->image);

            } else {
                $imagePath = $adBanner->image;
            }
            $adBanner->update([
                'user_id' => $userId,
                'position' => $data['position'],
                'course_id' => $data['course_id'],
                'image' => $imagePath,
                'link' => $data['link'],
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
            'message' => $adBanner
        ];
        return nullable($response);
    }

    public static function destroyCourse($adBanner)
    {
        self::destroyImages($adBanner);
        $adBanner->delete();
    }

    public static function destroyImages($adBanner): void
    {
        if (File::exists(public_path($adBanner->image))) {
            File::delete(public_path($adBanner->image));
        }
    }

    public static function destroyImage($image): void
    {
        if (File::exists(public_path($image))) {
            File::delete(public_path($image));
        }
    }
}
