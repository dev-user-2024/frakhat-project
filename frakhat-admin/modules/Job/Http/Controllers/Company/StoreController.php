<?php

namespace Modules\Job\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Job\Database\JobStore;
use Modules\Job\Http\Responses\HtmlyResponses;
use Modules\Job\ProtectionLayers\ValidateForms;

class StoreController extends Controller
{
    public function __construct()
    {
        ValidateForms::install();
        resolve(StartGuarding::class)->start();
    }
    public function store()
    {
        //validate data
        HeyMan::checkPoint('company.store');
        //prepare data
        $data = request()->except('logo');
        //create data
        $company = JobStore::storeCompany($data, auth()->id())
            ->getOrSend([HtmlyResponses::class, 'failed']);

        return HtmlyResponses::success();
    }

}
