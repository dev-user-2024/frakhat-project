<?php

namespace Modules\UserAuth\Authenticator;

use App\Models\User;
use App\Services\Uploader\ImageUploader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Modules\Image\Database\Models\Image;
use Modules\UserDetail\Database\Models\UserDetail;
use Illuminate\Support\Facades\DB;

class SessionAuth
{
    public function check()
    {
        return Auth::check();
    }
    public function createUserByMobile($mobile)
    {
        //create user
        $user = User::create([
            'mobile' => $mobile,
        ]);
        $token = $user->createToken('authToken')->plainTextToken;
        $data = [
            'api_token' => $user->createToken('authToken')->plainTextToken,
            'id' => $user->id,
            'mobile' => $user->mobile,
        ];
        return $data;
    }

    public function updateUserInRegister($data, $user)
    {
        try {
            // Handle user data update
            $userData = [
                'name' => $data['name'],
                'family' => $data['family'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ];
            $user->update($userData);

            // Handle profile image
            $profilePath = $this->handleProfileImage($data['image'], $user);

            // Use transaction for user detail update or create
            DB::beginTransaction();
            $userDetail = UserDetail::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'city' => $data['city'],
                    'tell' => $data['tell'],
                    'birth_day' => $data['birth_day'],
                    'national_code' => $data['national_code'],
                ]
            );
            DB::commit();

            // Prepare the response data
            $response = [
                'status' => 'success',
                'data' => [
                    'api_token' => $user->createToken('authToken')->plainTextToken,
                    'name' => $user->name,
                    'family' => $user->family,
                    'email' => $user->email,
                    'mobile' => $user->mobile,
                    'city' => $userDetail->city,
                    'tell' => $userDetail->tell,
                    'birth_day' => $userDetail->birth_day,
                    'national_code' => $userDetail->national_code,
                    'profile_image' => $profilePath,
                ],
            ];

            return nullable($response);
        } catch (\Exception $e) {
            DB::rollBack();
            $response = [
                'status' => 'error',
                'data' => $e->getMessage(),
            ];
            return nullable($response);
        }
    }

    public function handleProfileImage($imageData, $user)
    {
        if ($imageData) {
            $profilePath = ImageUploader::upload($imageData, 'users', null, 800, 600, true);
            if ($user->image && $user->image->url) {
                $this->destroyImage($user->image->url);
            }
        } else {
            $profilePath = optional($user->image)->url ?? '';
        }

        if ($user->image) {
            $user->image->url = $profilePath;
            $user->image->save();
        } else {
            $image = new Image(['url' => $profilePath]);
            $user->image()->save($image);
        }

        return $profilePath;
    }

    public function destroyImage($image = null): void
    {
        if (File::exists(public_path($image))) {
            File::delete(public_path($image));
        }
    }




    public function loginUser($user)
    {
        if(!auth()->attempt($user))
        {
            return nullable(null);
        }
        return nullable($user);
    }


//    public function updateUserInRegister($data, $user)
//    {
//        try {
//            $user->update([
//                'name' => $data['name'],
//                'family' => $data['family'],
//                'email' => $data['email'],
//                'password' => bcrypt($data['password']),
//            ]);
//            if ($data['image']) {
//                $profilePath = ImageUploader::upload($data['image'], 'users', null, 800, 600, true);
//                if(isset($user->image->url))
//                    self::destroyImage($user->image->url);
//
//            }  else {
//                $profilePath = $user->image->url ?? '';
//            }
//            if ($user->image && $user->image->url) {
//                $user->image->url = $profilePath;
//                $user->image->save();
//            } else {
//                $image = new Image([
//                    'url' => $profilePath,
//                ]);
//                $user->image()->save($image);
//            }
//
//            $userDetail = UserDetail::updateOrCreate(
//                ['user_id' => $user->id],
//                [
//                    'city' => $data['city'],
//                    'tell' => $data['tell'],
//                    'birth_day' => $data['birth_day'],
//                    'national_code' => $data['national_code'],
//                ]
//            );
//            $user = [
//                'api_token' => $user->createToken('authToken')->plainTextToken,
//                'name' => $user->name,
//                'family' => $user->family,
//                'email' => $user->email,
//                'mobile' => $user->mobile,
//                'city' => $userDetail->city,
//                'tell' => $userDetail->tell,
//                'birth_day' => $userDetail->birth_day,
//                'national_code' => $userDetail->national_code,
//                'profile_image' => $profilePath,
//
//            ];
//            $response = [
//                'status' => 'success',
//                'message' => $user
//            ];
//            return nullable($response);
//
//        } catch (\Exception $e) {
//            $response = [
//                'status' => 'error',
//                'message' => $e->getMessage()
//            ];
//            return nullable($response);
//        }
//
//
//    }
}
