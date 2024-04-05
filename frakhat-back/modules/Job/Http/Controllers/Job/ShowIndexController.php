<?php

namespace Modules\Job\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Modules\Job\Facades\JobProviderFacade;
use Modules\Job\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        //get jobs
        $jobs = JobProviderFacade::getAllJobs();
        $data = [
            'jobs' => $jobs
        ];
        //send response
        return HtmlyResponses::getDataResponse('job::job.index', $data);
    }

}
