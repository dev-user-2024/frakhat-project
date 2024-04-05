<?php

namespace Modules\Job\Http\Controllers\Job;

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
        HeyMan::checkPoint('job.update');
        //prepare data
        $data = request()->except('tag_id');
        //update data
        $job = JobStore::updateJob($id, $data, auth()->id());
        return HtmlyResponses::success();

    }
}
