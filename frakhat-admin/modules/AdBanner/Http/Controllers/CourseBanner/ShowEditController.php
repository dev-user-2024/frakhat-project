<?php

namespace Modules\AdBanner\Http\Controllers\CourseBanner;

use App\Http\Controllers\Controller;
use App\Models\course;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\AdBanner\Database\AdBannerStore;
use Modules\AdBanner\Facades\AdBannerProviderFacade;
use Modules\AdBanner\Facades\SlugProviderFacade;
use Modules\AdBanner\Http\ResponderFacade;
use Modules\AdBanner\Http\Responses\HtmlyResponses;
use Modules\AdBanner\ProtectionLayers\ValidateForms;
use Modules\Discount\Facades\DiscountProviderFacade;

class ShowEditController extends Controller
{
    public function edit($id)
    {
        $adBanner = AdBannerProviderFacade::getCourseBannerByid($id);
        $courses = course::all();
        $data = [
            'adBanner' => $adBanner,
            'courses' => $courses
        ];
        //send response
        return HtmlyResponses::getDataResponse('adBanner::courseBanner.edit', $data);
    }

}
