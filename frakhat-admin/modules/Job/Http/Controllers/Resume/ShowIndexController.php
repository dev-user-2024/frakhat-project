<?php

namespace Modules\Job\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use Modules\Job\Facades\JobProviderFacade;
use Modules\Job\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        $resumes = JobProviderFacade::getAllResume();
        $data = [
            'resumes' => $resumes
        ];
        //send response
        return HtmlyResponses::getDataResponse('job::resume.index', $data);
    }

}
