<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Category\Http\Responses\HtmlyResponses;
use Modules\Language\Facades\LanguageProviderFacade;

class ShowEditController extends Controller
{
    public function edit($id)
    {
        //get category by id
        $category = CategoryProviderFacade::getCategoryByid($id);
        //get categories
        $categories = CategoryProviderFacade::getCategoriesByStringType($category->categoryable_type);
        $languages = LanguageProviderFacade::getAllLanguages();

        $data = [
            'type' => $category->categoryable_type,
            'category' => $category,
            'categories' => $categories,
            'languages' => $languages
        ];
        //send response
        return HtmlyResponses::getDataResponse('category::category.edit', $data);
    }

}
