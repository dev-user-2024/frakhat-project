<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Category\Database\CategoryStore;
use Modules\Category\Database\Transactioner;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Category\Facades\SlugProviderFacade;
use Modules\Category\Http\ResponderFacade;
use Modules\Category\Http\Responses\HtmlyResponses;
use Modules\Category\ProtectionLayers\ValidateForms;

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
        HeyMan::checkPoint('category.update');
        //prepare data
        $data = request()->only(['categoryable_type', 'parent_id']);
        //update data
        $category = CategoryStore::middlewared([Transactioner::class])
            ->update($id, $data, auth()->id());
        return HtmlyResponses::success();

    }
}
