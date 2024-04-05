<?php

namespace Modules\Job\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\Province;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Job\Database\Models\JobGroup;
use Modules\Job\Facades\JobProviderFacade;
use Modules\Language\Facades\LanguageProviderFacade;
use Modules\Post\Http\Responses\HtmlyResponses;
use Modules\Tag\Facades\TagProviderFacade;

class ShowCreateController extends Controller
{
    public function create()
    {
        $tags = TagProviderFacade::getAllTags();
        $companies = JobProviderFacade::getAllCompany();
        $courses = course::all();
        $provinces = Province::all();
        $job_groups = JobGroup::all();
        $data = [
            'companies' => $companies,
            'tags' => $tags,
            'courses' => $courses,
            'provinces' => $provinces,
            'job_groups' => $job_groups,

        ];
        //send response
        return HtmlyResponses::getDataResponse('job::job.create', $data);
    }

}
