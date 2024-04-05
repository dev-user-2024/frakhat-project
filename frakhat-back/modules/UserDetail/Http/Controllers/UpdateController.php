<?php

namespace Modules\UserDetail\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\UserDetail\Database\UserDetailStore;
use Modules\UserDetail\Http\Responses\HtmlyResponses;
use Modules\UserDetail\ProtectionLayers\ValidateForms;

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
        HeyMan::checkPoint('userDetail.update');
        //prepare data
        $data = request()->all();
        //update data
        $userDetail = UserDetailStore::update($id, $data);
        return HtmlyResponses::success();

    }
}
