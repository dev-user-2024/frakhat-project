<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Category\Http\Responses\HtmlyResponses;
use Modules\Language\Facades\LanguageProviderFacade;

class ShowCreateController extends Controller
{
    public function create($type)
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
        return HtmlyResponses::getDataResponse('category::category.create', $data);
    }

}
