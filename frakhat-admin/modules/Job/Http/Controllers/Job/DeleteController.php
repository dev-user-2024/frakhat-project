<?php

namespace Modules\Job\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Modules\Job\Database\JobStore;
use Modules\Job\Facades\JobProviderFacade;
use Modules\Job\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        //get job by id
        $job = JobProviderFacade::getJobByid($id);
        JobStore::destroy($job);
        return HtmlyResponses::success();

    }
}
