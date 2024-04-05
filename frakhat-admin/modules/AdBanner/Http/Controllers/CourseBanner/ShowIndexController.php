<?php

namespace Modules\AdBanner\Http\Controllers\CourseBanner;

use App\Http\Controllers\Controller;
use Modules\AdBanner\Facades\AdBannerProviderFacade;
use Modules\AdBanner\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        $adBanners = AdBannerProviderFacade::getAllCourseBanners();
        $data = [
            'adBanners' => $adBanners
        ];
        //send response
        return HtmlyResponses::getDataResponse('adBanner::courseBanner.index', $data);
    }

}
