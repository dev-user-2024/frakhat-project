<?php

namespace Modules\Menu\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Modules\Menu\Database\MenuStore;
use Modules\Menu\Facades\MenuProviderFacade;
use Modules\Menu\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        //get menu by id
        $menu = MenuProviderFacade::getMenuByid($id);
        MenuStore::destroy($menu);
        return HtmlyResponses::success();

    }
}
