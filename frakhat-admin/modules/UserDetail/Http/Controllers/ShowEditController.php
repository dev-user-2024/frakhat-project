<?php

namespace Modules\UserDetail\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\UserDetail\Database\UserDetailStore;
use Modules\UserDetail\Facades\UserDetailProviderFacade;
use Modules\UserDetail\Facades\SlugProviderFacade;
use Modules\UserDetail\Http\ResponderFacade;
use Modules\UserDetail\Http\Responses\HtmlyResponses;
use Modules\UserDetail\ProtectionLayers\ValidateForms;

class ShowEditController extends Controller
{
    public function edit($role, $id)
    {
        //get userDetail by id
        $userDetail = UserDetailProviderFacade::getUserByid($id);
        $data = [
            'userDetail' => $userDetail,
            'role' => $role,
        ];
        //send response
        return HtmlyResponses::getDataResponse('userDetail::userDetail.edit', $data);
    }

}
