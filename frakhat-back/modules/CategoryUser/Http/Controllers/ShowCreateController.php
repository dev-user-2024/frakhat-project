<?php

namespace Modules\CategoryUser\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\CategoryUser\Facades\CategoryUserProviderFacade;
use Modules\CategoryUser\Http\Responses\HtmlyResponses;

class ShowCreateController extends Controller
{
    public function create()
    {
        //get categoryUser by id
        $reporters = CategoryUserProviderFacade::getAllReporter();
        $postCategories = CategoryProviderFacade::getCategoriesByStringType('Post');
        $data = [
            'reporters' => $reporters,
            'postCategories' => $postCategories,
        ];
        //send response
        return HtmlyResponses::getDataResponse('categoryUser::categoryUser.create', $data);
    }

}
