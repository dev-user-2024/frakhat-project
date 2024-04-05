<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Discount\Facades\DiscountProviderFacade;
use Modules\Discount\Http\Responses\HtmlyResponses;

class IndexOrderController extends Controller
{
    public function index()
    {
        //get discounts
        $orders = DiscountProviderFacade::getAllOrders();
        $data = [
            'orders' => $orders
        ];
        //send response
        return HtmlyResponses::getDataResponse('discount::order.index', $data);
    }

}
