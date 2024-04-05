<?php

namespace Modules\AdBanner\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\AdBanner\Database\AdBannerStore;
use Modules\AdBanner\Facades\AdBannerProviderFacade;
use Modules\AdBanner\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        //get adBanner by id
        $adBanner = AdBannerProviderFacade::getAdBannerByid($id);
        AdBannerStore::destroy($adBanner);
        return HtmlyResponses::success();

    }
}
