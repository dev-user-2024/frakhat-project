<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Discount\Facades\DiscountProviderFacade;
use Modules\Discount\Http\Responses\HtmlyResponses;

class IndexFeeController extends Controller
{
    public function index()
    {
        //get discounts
        $fees = DiscountProviderFacade::getAllFees();
        $data = [
            'fees' => $fees
        ];
        //send response
        return HtmlyResponses::getDataResponse('discount::fee.index', $data);
    }

}
