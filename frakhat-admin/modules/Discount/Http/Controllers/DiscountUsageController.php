<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Discount\Facades\DiscountProviderFacade;
use Modules\Discount\Http\Responses\HtmlyResponses;

class DiscountUsageController extends Controller
{
    public function index()
    {
        $discountUsages = DiscountProviderFacade::getAllDiscountUsage();
        $data = [
            'discounts' => $discountUsages
        ];
        //send response
        return HtmlyResponses::getDataResponse('discount::discoutUsage.index', $data);
    }

}
