<?php

namespace Modules\UserDetail\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\UserDetail\Facades\UserDetailProviderFacade;
use Modules\UserDetail\Http\Responses\HtmlyResponses;

class ShowInfoController extends Controller
{
    public function info($role, $id)
    {
        //get userDetail by id
        $userDetail = UserDetailProviderFacade::getUserByid($id);
        $data = [
            'userDetail' => $userDetail,
            'role' => $role,
        ];
        //send response
        return HtmlyResponses::getDataResponse('userDetail::userDetail.info', $data);
    }

}
