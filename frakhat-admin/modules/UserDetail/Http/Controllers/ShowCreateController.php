<?php

namespace Modules\UserDetail\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Category\Http\Responses\HtmlyResponses;
use Modules\Language\Facades\LanguageProviderFacade;

class ShowCreateController extends Controller
{
    public function create($role)
    {
        $data = [
            'role' => $role,
        ];
        //send response
        return HtmlyResponses::getDataResponse('userDetail::userDetail.create', $data);
    }

}
