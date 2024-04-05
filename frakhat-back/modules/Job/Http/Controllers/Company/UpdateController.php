<?php

namespace Modules\Job\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Job\Database\JobStore;
use Modules\Job\Http\Responses\HtmlyResponses;
use Modules\Job\ProtectionLayers\ValidateForms;

class UpdateController extends Controller
{
    public function __construct()
    {
        ValidateForms::install();
        resolve(StartGuarding::class)->start();
    }
    public function update($id)
    {
        //validate data
        HeyMan::checkPoint('company.update');
        //update data
        JobStore::updateCompany($id, request()->except('logo'), auth()->id());
        return HtmlyResponses::success();

    }
}
