<?php

namespace Modules\Menu\Http\Controllers\Tab;

use App\Http\Controllers\Controller;
use Modules\Menu\Database\MenuStore;
use Modules\Menu\Facades\MenuProviderFacade;
use Modules\Menu\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        //get menu by id
        $menu = MenuProviderFacade::getTabByid($id);
        MenuStore::destroy($menu);
        return HtmlyResponses::success();

    }
}
