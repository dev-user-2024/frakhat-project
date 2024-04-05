<?php

namespace Modules\Menu\Http\Controllers\Tab;

use App\Http\Controllers\Controller;
use Modules\Menu\Facades\MenuProviderFacade;
use Modules\Menu\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        //get tabs
        $tabs = MenuProviderFacade::getAllTabs();
        $data = [
            'tabs' => $tabs
        ];
        //send response
        return HtmlyResponses::getDataResponse('menu::tab.index', $data);
    }

}
