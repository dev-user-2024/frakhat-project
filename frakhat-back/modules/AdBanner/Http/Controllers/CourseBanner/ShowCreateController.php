<?php

namespace Modules\AdBanner\Http\Controllers\CourseBanner;

use App\Http\Controllers\Controller;
use App\Models\course;
use Modules\AdBanner\Http\Responses\HtmlyResponses;
use Modules\Discount\Facades\DiscountProviderFacade;

class ShowCreateController extends Controller
{
    public function create()
    {
        $courses = course::all();
        $data = [
            'courses' => $courses
        ];
        //send response
        return HtmlyResponses::getDataResponse('adBanner::courseBanner.create', $data);
    }

}
