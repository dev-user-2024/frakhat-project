<?php

namespace Modules\Menu\Http\Controllers\Tab;

use App\Http\Controllers\Controller;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Menu\Facades\MenuProviderFacade;
use Modules\Menu\Http\Responses\HtmlyResponses;

class CreateController extends Controller
{
    public function create()
    {
        //get categories
        $categories = CategoryProviderFacade::getCategoriesByStringType('Post');
        $sections = MenuProviderFacade::getAllSections();
        $data = [
            'categories' => $categories,
            'sections' => $sections,
        ];
        //send response
        return HtmlyResponses::getDataResponse('menu::tab.create', $data);

    }
}
