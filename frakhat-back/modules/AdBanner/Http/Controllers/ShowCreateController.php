<?php

namespace Modules\AdBanner\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\AdBanner\Http\Responses\HtmlyResponses;
use Modules\Discount\Facades\DiscountProviderFacade;

class ShowCreateController extends Controller
{
    public function create()
    {
        $discounts = DiscountProviderFacade::getDiscountByUser(auth()->id());
        $data = [
            'discount' => $discounts
        ];
        //send response
        return HtmlyResponses::getDataResponse('adBanner::adBanner.create', $data);
    }

}
