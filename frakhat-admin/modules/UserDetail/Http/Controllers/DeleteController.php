<?php

namespace Modules\UserDetail\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\UserDetail\Database\UserDetailStore;
use Modules\UserDetail\Facades\UserDetailProviderFacade;
use Modules\UserDetail\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        //get userDetail by id
        $userDetail = UserDetailProviderFacade::getUserDetailByid($id);
        UserDetailStore::destroy($userDetail);
        return HtmlyResponses::success();

    }
}
