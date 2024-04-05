<?php

namespace Modules\Menu\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Modules\Menu\Facades\MenuProviderFacade;
use Modules\Menu\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        //get menus
        $menus = MenuProviderFacade::getAllMenus();
        $data = [
            'menus' => $menus
        ];
        //send response
        return HtmlyResponses::getDataResponse('menu::menu.index', $data);
    }

}
