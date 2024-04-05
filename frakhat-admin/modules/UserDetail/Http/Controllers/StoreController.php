<?php

namespace Modules\UserDetail\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\UserDetail\Database\UserDetailStore;
use Modules\UserDetail\Http\Responses\HtmlyResponses;
use Modules\UserDetail\ProtectionLayers\ValidateForms;

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
        HeyMan::checkPoint('userDetail.store');
        //prepare data
        $data = request()->all();
        //create data
        $userDetail = UserDetailStore::store($data)
            ->getOrSend([HtmlyResponses::class, 'failed']);

        return HtmlyResponses::success();
    }

}
