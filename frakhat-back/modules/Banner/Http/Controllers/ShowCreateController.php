<?php

namespace Modules\Banner\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Banner\Http\Responses\HtmlyResponses;
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
        return HtmlyResponses::getDataResponse('banner::banner.create', $data);
    }

}
