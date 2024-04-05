<?php

namespace Modules\UserDetail\Database;

use App\Models\User;
use App\Services\Uploader\ImageUploader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Imanghafoori\Helpers\Nullable;
use Modules\Image\Database\Models\Image;
use Modules\UserDetail\Database\Models\UserDetail;

class UserDetailStore
{
    public static function store($data): Nullable
    {
        DB::beginTransaction();
        try {
            $data['password'] = bcrypt($data['password']); // bcrypt the password
            $user = User::create($data);
            $user->assignRole($data['role']); // assuming you're using Spatie's Laravel Permission package for role management
        } catch (\Exception $e) {
            DB::rollBack();
            return nullable();
        }
        DB::commit();
        return nullable($user);
    }

    public static function update($id, $data)
    {
        $data['password'] = bcrypt($data['password']); // bcrypt the password
        $user = User::findOrFail($id);
        return $user->update($data);

    }

    public static function updateProfile($id, $data, $profile = null, $fish_water = null, $upload_national_code = null)
    {
        $user = auth()->user();

        if (request()->file('image')) {
            $profilePath = ImageUploader::upload($profile, 'users', null, 800, 600, true);
            self::destroyImage($user->image->url);
        }  else {
            $profilePath = $user->image->url ?? '';
        }
        if ($fish_water) {
            $fish_waterPath = ImageUploader::upload($fish_water, 'users', null, 800, 600, true);
            if(isset($user->userDetail->fish_water))
                self::destroyImage($user->userDetail->fish_water);
        }  else {
            $fish_waterPath = $user->userDetail->fish_water ?? '';
        }
        if ($upload_national_code) {
            $upload_national_codePath = ImageUploader::upload($upload_national_code, 'users', null, 800, 600, true);
            if(isset($user->userDetail->upload_national_code))
                self::destroyImage($user->userDetail->upload_national_code);
        } else {
            $upload_national_codePath = $user->userDetail->upload_national_code ?? '';
        }
        $userData = [
            'name' => $data['name'],
            'family' => $data['family'],
        ];
        $userDetailData = [
            'card_number' => $data['card_number'],
            'shaba_number' => $data['shaba_number'],
            'type_learn' => $data['type_learn'],
            'hiring_frakhat' => $data['hiring_frakhat'],
            'University_faculty' => $data['University_faculty'],
            'status_education' => $data['status_education'],
            'fish_water' => $fish_waterPath,
            'national_code' => $data['national_code'],
            'address' => $data['address'],
            'upload_national_code' => $upload_national_codePath,
        ];

        try {
            if ($user->image && $user->image->url) {
                // User already has an image, update the existing record
                $user->image->url = $profilePath;
                $user->image->save();
            } else {
                // User doesn't have an image, create a new record
                $image = new Image([
                    'url' => $profilePath,
                ]);

                $user->image()->save($image);
            }
            // Find the user and update the fields in the 'users' table
            $user = User::findOrFail($id);
            $user->update($userData);

            // Find the associated user detail and update the fields in the 'user_details' table
            $userDetail = UserDetail::updateOrCreate(['user_id' => $user->id], $userDetailData);


            return nullable($user);
        } catch (\Exception $e) {
            return nullable();
        }

    }

    public static function destroy($userDetail)
    {
        $userDetail->delete();
    }
    public static function destroyImage($image = null): void
    {
        if (File::exists(public_path($image))) {
            File::delete(public_path($image));
        }
    }
}
