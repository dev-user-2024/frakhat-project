<?php

namespace Modules\Menu\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Menu\Database\MenuStore;
use Modules\Menu\Http\Responses\HtmlyResponses;
use Modules\Menu\ProtectionLayers\ValidateForms;

class UpdateController extends Controller
{
    public function __construct()
    {
        ValidateForms::install();
        resolve(StartGuarding::class)->start();
    }
    public function update($id)
    {
        //validate data
        HeyMan::checkPoint('menu.update');
        //prepare data
        $data = request()->only(['title', 'code']);
        //update data
        $menu = MenuStore::update($id, $data, auth()->id());
        return HtmlyResponses::success();

    }
}
