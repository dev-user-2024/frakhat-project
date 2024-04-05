<?php

namespace Modules\Banner\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Banner\Database\BannerStore;
use Modules\Banner\Facades\BannerProviderFacade;
use Modules\Banner\Facades\SlugProviderFacade;
use Modules\Banner\Http\ResponderFacade;
use Modules\Banner\Http\Responses\HtmlyResponses;
use Modules\Banner\ProtectionLayers\ValidateForms;
use Modules\Discount\Facades\DiscountProviderFacade;

class ShowEditController extends Controller
{
    public function edit($id)
    {
        $discounts = DiscountProviderFacade::getDiscountByUser(auth()->id());
        $banner = BannerProviderFacade::getBannerByid($id);
        $data = [
            'banner' => $banner,
            'discount' => $discounts
        ];
        //send response
        return HtmlyResponses::getDataResponse('banner::banner.edit', $data);
    }

}
