<?php

namespace Modules\Menu\Http\Controllers\Tab;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Menu\Database\MenuStore;
use Modules\Menu\Http\Responses\HtmlyResponses;
use Modules\Menu\ProtectionLayers\ValidateForms;

class StoreController extends Controller
{
    public function __construct()
    {
        ValidateForms::install();
        resolve(StartGuarding::class)->start();
    }
    public function store()
    {
        //validate data
        HeyMan::checkPoint('menu.tab.store');
        //prepare data
        $data = request()->all();
        //create data
        $menu = MenuStore::storeTab($data, auth()->id())
            ->getOrSend([HtmlyResponses::class, 'failed']);

        return HtmlyResponses::success();
    }

}
