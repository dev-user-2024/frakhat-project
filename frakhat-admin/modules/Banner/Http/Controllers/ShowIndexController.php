<?php

namespace Modules\Banner\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Banner\Facades\BannerProviderFacade;
use Modules\Banner\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        //get banners
        $banners = BannerProviderFacade::getAllBanners();
        $data = [
            'banners' => $banners
        ];
        //send response
        return HtmlyResponses::getDataResponse('banner::banner.index', $data);
    }

}
