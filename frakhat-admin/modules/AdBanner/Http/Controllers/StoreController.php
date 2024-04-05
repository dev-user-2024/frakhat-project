<?php

namespace Modules\AdBanner\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\AdBanner\Database\AdBannerStore;
use Modules\AdBanner\Http\Responses\HtmlyResponses;
use Modules\AdBanner\ProtectionLayers\ValidateForms;

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
        HeyMan::checkPoint('adBanner.store');
        //prepare data
//        dd('ok');
        $data = request()->all();
        //create data
        $adBanner = AdBannerStore::store($data, auth()->id())
            ->getOrSend([HtmlyResponses::class, 'failed']);

        return HtmlyResponses::success();
    }

}
