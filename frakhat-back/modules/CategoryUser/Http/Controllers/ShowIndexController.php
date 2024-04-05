<?php

namespace Modules\CategoryUser\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\CategoryUser\Facades\CategoryUserProviderFacade;
use Modules\CategoryUser\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        //get categoryUsers
        $categoryUsers = CategoryUserProviderFacade::getAllCategoryUsers();
        $data = [
            'categoryUsers' => $categoryUsers
        ];
        //send response
        return HtmlyResponses::getDataResponse('categoryUser::categoryUser.index', $data);
    }

}
