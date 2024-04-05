<?php

namespace Modules\CategoryUser\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\CategoryUser\Database\CategoryUserStore;
use Modules\CategoryUser\Http\Responses\HtmlyResponses;
use Modules\CategoryUser\ProtectionLayers\ValidateForms;

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
        HeyMan::checkPoint('categoryUser.store');
        //prepare data
        $data = request()->all();
        //create data
        $categoryUser = CategoryUserStore::store($data)
            ->getOrSend([HtmlyResponses::class, 'failed']);

        return HtmlyResponses::success();
    }

}
