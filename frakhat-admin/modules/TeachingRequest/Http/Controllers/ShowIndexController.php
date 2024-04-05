<?php

namespace Modules\TeachingRequest\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\TeachingRequest\Facades\TeachingRequestProviderFacade;
use Modules\TeachingRequest\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        //get teachingRequests
        $teachingRequests = TeachingRequestProviderFacade::getAllTeachingRequests();
        $data = [
            'teachingRequests' => $teachingRequests
        ];
        //send response
        return HtmlyResponses::getDataResponse('teachingRequest::teachingRequest.index', $data);
    }

}
