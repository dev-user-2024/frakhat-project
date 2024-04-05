<?php

namespace Modules\AdBanner\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\AdBanner\Database\AdBannerStore;
use Modules\AdBanner\Facades\AdBannerProviderFacade;
use Modules\AdBanner\Facades\SlugProviderFacade;
use Modules\AdBanner\Http\ResponderFacade;
use Modules\AdBanner\Http\Responses\HtmlyResponses;
use Modules\AdBanner\ProtectionLayers\ValidateForms;
use Modules\Discount\Facades\DiscountProviderFacade;

class ShowEditController extends Controller
{
    public function edit($id)
    {
        $discounts = DiscountProviderFacade::getDiscountByUser(auth()->id());
        $adBanner = AdBannerProviderFacade::getAdBannerByid($id);
        $data = [
            'adBanner' => $adBanner,
            'discount' => $discounts
        ];
        //send response
        return HtmlyResponses::getDataResponse('adBanner::adBanner.edit', $data);
    }

}
