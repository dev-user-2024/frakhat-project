<?php

namespace Modules\Menu\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Modules\Menu\Facades\MenuProviderFacade;
use Modules\Menu\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        //get menus
        $sections = MenuProviderFacade::getAllSections();
        $data = [
            'sections' => $sections
        ];
        //send response
        return HtmlyResponses::getDataResponse('menu::section.index', $data);
    }

}
