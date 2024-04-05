<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Discount\Facades\DiscountProviderFacade;
use Modules\Discount\Http\Responses\HtmlyResponses;

class IndexCartController extends Controller
{
    public function index()
    {
        //get discounts
        $carts = DiscountProviderFacade::getAllCarts();
        $data = [
            'carts' => $carts
        ];
        //send response
        return HtmlyResponses::getDataResponse('discount::cart.index', $data);
    }

}
