<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Discount\Facades\DiscountProviderFacade;
use Modules\Discount\Http\Responses\HtmlyResponses;

class IndexDiscountController extends Controller
{
    public function index($type)
    {

        $discounts = DiscountProviderFacade::getAllDiscounts($type);
        $data = [
            'discounts' => $discounts,
            'type' => $type
        ];
        //send response
        return HtmlyResponses::getDataResponse('discount::discount.indexDiscount', $data);
    }

}
