<?php

namespace Modules\Menu\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Menu\Http\Responses\HtmlyResponses;

class CreateController extends Controller
{
    public function create()
    {
        //get categories
        $categories = CategoryProviderFacade::getCategoriesByStringType('Post');
        $data = [
            'categories' => $categories
        ];
        //send response
        return HtmlyResponses::getDataResponse('menu::menu.create', $data);

    }
}
