<?php

namespace Modules\UserDetail\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\UserDetail\Database\UserDetailStore;
use Modules\UserDetail\Http\Responses\HtmlyResponses;
use Modules\UserDetail\ProtectionLayers\ValidateForms;
use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function __construct()
    {
        ValidateForms::install();
        resolve(StartGuarding::class)->start();
    }
    public function update($id)
    {
        $type_update = 'updateProfile';

        //validate data
        HeyMan::checkPoint('userDetail.profile.update');
        //prepare data
        $data = request()->all();

        //update data
        $userDetail = UserDetailStore::updateProfile($id, $data, request()->file('image'), request()->file('fish_water'), request()->file('upload_codemili'))
            ->getOrSend([HtmlyResponses::class, 'failed']);
        return HtmlyResponses::successWithData($type_update);

    }


    public function changePassword(Request $request)
    {
        $type_update = 'changePassword';

        // Validate the form inputs
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        // Get the current authenticated user
        $user = Auth::user();
        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            // Current password is incorrect
            return back()->withErrors(['current_password' => 'رمزعبور فعلی نادرست است.']);
        }

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->password),
        ]);


        // Password successfully updated
        return HtmlyResponses::successWithData($type_update);

    }








}
