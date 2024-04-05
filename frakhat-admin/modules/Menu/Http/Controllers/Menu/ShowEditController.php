<?php

namespace Modules\Menu\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Menu\Facades\MenuProviderFacade;
use Modules\Menu\Facades\SlugProviderFacade;
use Modules\Menu\Http\Responses\HtmlyResponses;

class ShowEditController extends Controller
{
    public function edit($id)
    {
        //get menu by id
        $menu = MenuProviderFacade::getMenuByid($id);
        //get categories
        $categories = CategoryProviderFacade::getCategoriesByStringType('Post');
        $data = [
            'menu' => $menu,
            'categories' => $categories
        ];
        //send response
        return HtmlyResponses::getDataResponse('menu::menu.edit', $data);
    }

}
