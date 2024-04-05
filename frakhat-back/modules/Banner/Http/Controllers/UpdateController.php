<?php

namespace Modules\Banner\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Banner\Database\BannerStore;
use Modules\Banner\Http\Responses\HtmlyResponses;
use Modules\Banner\ProtectionLayers\ValidateForms;

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
        HeyMan::checkPoint('banner.update');
        //prepare data
        $data = request()->all();
        //update data
        $banner = BannerStore::update($id, $data, auth()->id(), request()->file('image'), request()->file('logo'));
        return HtmlyResponses::success();

    }
}
