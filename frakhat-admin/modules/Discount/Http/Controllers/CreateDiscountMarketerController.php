<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Discount\Http\Responses\HtmlyResponses;


class CreateDiscountMarketerController extends Controller
{
    public function create()
    {
        //get categories
        $categories = CourseCategory::all();

        $data = [
            'categories' => $categories,
        ];
        //send response
        return HtmlyResponses::getDataResponse('discount::discount.createMarketer', $data);
    }

}
