<?php

namespace Modules\UserDetail\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\UserDetail\Facades\UserDetailProviderFacade;
use Modules\UserDetail\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index($role)
    {
        //get users
        $userDetails = UserDetailProviderFacade::getAllUsersbyRole($role);
        $data = [
            'userDetails' => $userDetails,
            'role' => $role
        ];
        //send response
        return HtmlyResponses::getDataResponse('userDetail::userDetail.index', $data);
    }

}
