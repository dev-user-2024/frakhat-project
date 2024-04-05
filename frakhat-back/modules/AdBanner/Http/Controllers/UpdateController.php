<?php

namespace Modules\AdBanner\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\AdBanner\Database\AdBannerStore;
use Modules\AdBanner\Http\Responses\HtmlyResponses;
use Modules\AdBanner\ProtectionLayers\ValidateForms;

class UpdateController extends Controller
{
    public function __construct()
    {
        ValidateForms::install();
        resolve(StartGuarding::class)->start();
    }
    public function update($id)
    {
//        dd(request());
        //validate data
        HeyMan::checkPoint('adBanner.update');
        //prepare data
        $data = request()->all();
        //update data
        $adBanner = AdBannerStore::update($id, $data, auth()->id(), request()->file('image'));
        return HtmlyResponses::success();

    }
}
