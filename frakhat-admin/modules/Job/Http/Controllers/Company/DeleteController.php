<?php

namespace Modules\Job\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Modules\Job\Database\JobStore;
use Modules\Job\Facades\JobProviderFacade;
use Modules\Job\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        $company = JobProviderFacade::getCompanyByid($id);
        JobStore::destroy($company);
        return HtmlyResponses::success();

    }
}
