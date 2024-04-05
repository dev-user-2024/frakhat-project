<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Discount\Facades\DiscountProviderFacade;
use Modules\Discount\Http\Responses\HtmlyResponses;

class IndexDiscountMarketerController extends Controller
{
    public function index()
    {
        //get discounts
        $discounts = DiscountProviderFacade::getAllDiscountMarketers();
        $data = [
            'discounts' => $discounts
        ];
        //send response
        return HtmlyResponses::getDataResponse('discount::discount.indexMarketer', $data);
    }

}
