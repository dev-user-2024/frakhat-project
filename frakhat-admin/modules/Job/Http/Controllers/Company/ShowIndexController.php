<?php

namespace Modules\Job\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Modules\Job\Facades\JobProviderFacade;
use Modules\Job\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        $companies = JobProviderFacade::getAllCompany();
        $data = [
            'companies' => $companies
        ];
        //send response
        return HtmlyResponses::getDataResponse('job::company.index', $data);
    }

}
