<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Category\Http\Responses\HtmlyResponses;
use Modules\Language\Facades\LanguageProviderFacade;

class ShowIndexController extends Controller
{
    public function index($type)
    {
        //get categories
        $categories = CategoryProviderFacade::getCategoriesByStringType($type);
        $languages = LanguageProviderFacade::getAllLanguages();
        $data = [
            'type' => $type,
            'categories' => $categories,
            'languages' => $languages
        ];
        //send response
        return HtmlyResponses::getDataResponse('category::category.index', $data);
    }

}
