<?php

namespace Modules\CategoryUser\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\CategoryUser\Database\CategoryUserStore;
use Modules\CategoryUser\Facades\CategoryUserProviderFacade;
use Modules\CategoryUser\Facades\SlugProviderFacade;
use Modules\CategoryUser\Http\ResponderFacade;
use Modules\CategoryUser\Http\Responses\HtmlyResponses;
use Modules\CategoryUser\ProtectionLayers\ValidateForms;

class ShowEditController extends Controller
{
    public function edit($id)
    {
        //get categoryUser by id
        $categoryUser = CategoryUserProviderFacade::getCategoryUserByUserId($id);

        $reporters = CategoryUserProviderFacade::getAllReporter();
        $postCategories = CategoryProviderFacade::getCategoriesByStringType('Post');
        $data = [
            'reporters' => $reporters,
            'postCategories' => $postCategories,
            'categoryUser' => $categoryUser
        ];

        //send response
        return HtmlyResponses::getDataResponse('categoryUser::categoryUser.edit', $data);
    }

}
