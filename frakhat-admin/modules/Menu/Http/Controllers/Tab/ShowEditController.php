<?php

namespace Modules\Menu\Http\Controllers\Tab;

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
        $menu = MenuProviderFacade::getTabByid($id);
        //get categories
        $categories = CategoryProviderFacade::getCategoriesByStringType('Post');
        $sections = MenuProviderFacade::getAllSections();
        $data = [
            'menu' => $menu,
            'categories' => $categories,
            'sections' => $sections,
        ];
        //send response
        return HtmlyResponses::getDataResponse('menu::tab.edit', $data);
    }

}
