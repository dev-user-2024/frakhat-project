<?php

namespace Modules\Banner\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Banner\Database\BannerStore;
use Modules\Banner\Http\Responses\HtmlyResponses;
use Modules\Banner\ProtectionLayers\ValidateForms;

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
        HeyMan::checkPoint('banner.store');
        //prepare data
//        dd('ok');
        $data = request()->all();
        //create data
        $banner = BannerStore::store($data, auth()->id())
            ->getOrSend([HtmlyResponses::class, 'failed']);

        return HtmlyResponses::success();
    }

}
