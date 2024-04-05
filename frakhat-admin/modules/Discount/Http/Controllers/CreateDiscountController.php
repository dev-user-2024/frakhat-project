<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\course;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Discount\Facades\DiscountProviderFacade;
use Modules\Discount\Http\Responses\HtmlyResponses;


class CreateDiscountController extends Controller
{
    public function create($type)
    {
        $discountMarketers = DiscountProviderFacade::getAllDiscounts($type);
        $courses = course::all();
        $data = [
            'discountMarketers' => $discountMarketers,
            'type' => $type,
            'courses' => $courses
        ];
        //send response
        return HtmlyResponses::getDataResponse('discount::discount.createDiscount', $data);
    }

}
