<?php

namespace Modules\Job\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\course;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Job\Database\JobStore;
use Modules\Job\Facades\JobProviderFacade;
use Modules\Job\Facades\SlugProviderFacade;
use Modules\Job\Http\ResponderFacade;
use Modules\Job\Http\Responses\HtmlyResponses;
use Modules\Job\ProtectionLayers\ValidateForms;
use Modules\Tag\Facades\TagProviderFacade;

class ShowEditController extends Controller
{
    public function edit($id)
    {
        //get job by id
        $job = JobProviderFacade::getJobByid($id);
        $tags = TagProviderFacade::getAllTags();
        $companies = JobProviderFacade::getAllCompany();
        $courses = Course::all();
        $data = [
            'companies' => $companies,
            'tags' => $tags,
            'courses' => $courses,
            'job' => $job

        ];
        //send response
        return HtmlyResponses::getDataResponse('job::job.edit', $data);
    }

}
