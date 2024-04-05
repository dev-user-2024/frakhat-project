<?php

namespace Modules\Banner\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Banner\Database\BannerStore;
use Modules\Banner\Facades\BannerProviderFacade;
use Modules\Banner\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        //get banner by id
        $banner = BannerProviderFacade::getBannerByid($id);
        BannerStore::destroy($banner);
        return HtmlyResponses::success();

    }
}
