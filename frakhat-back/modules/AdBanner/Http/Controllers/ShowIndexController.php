<?php

namespace Modules\AdBanner\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\AdBanner\Facades\AdBannerProviderFacade;
use Modules\AdBanner\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        //get adBanners
        $adBanners = AdBannerProviderFacade::getAllAdBanners();
        $data = [
            'adBanners' => $adBanners
        ];
        //send response
        return HtmlyResponses::getDataResponse('adBanner::adBanner.index', $data);
    }

}
