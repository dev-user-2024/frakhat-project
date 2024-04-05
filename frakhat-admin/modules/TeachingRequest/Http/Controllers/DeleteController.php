<?php

namespace Modules\TeachingRequest\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\TeachingRequest\Database\TeachingRequestStore;
use Modules\TeachingRequest\Facades\TeachingRequestProviderFacade;
use Modules\TeachingRequest\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        //get teachingRequest by id
        $teachingRequest = TeachingRequestProviderFacade::getTeachingRequestByid($id);
        TeachingRequestStore::destroy($teachingRequest);
        return HtmlyResponses::success();

    }
}
