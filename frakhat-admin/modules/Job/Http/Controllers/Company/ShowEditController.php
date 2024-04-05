<?php

namespace Modules\Job\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Job\Database\JobStore;
use Modules\Job\Facades\JobProviderFacade;
use Modules\Job\Facades\SlugProviderFacade;
use Modules\Job\Http\ResponderFacade;
use Modules\Job\Http\Responses\HtmlyResponses;
use Modules\Job\ProtectionLayers\ValidateForms;

class ShowEditController extends Controller
{
    public function edit($id)
    {
        //get job by id
        $company = JobProviderFacade::getCompanyByid($id);
        $data = [
            'company' => $company
        ];
        //send response
        return HtmlyResponses::getDataResponse('job::company.edit', $data);
    }

}
