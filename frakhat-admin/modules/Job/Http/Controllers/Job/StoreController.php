<?php

namespace Modules\Job\Http\Controllers\Job;

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
        HeyMan::checkPoint('job.store');
        //prepare data
        $data = request()->except('tag_id');
        //create data

        $job = JobStore::storeJob($data, auth()->id())
            ->getOrSend([HtmlyResponses::class, 'failed']);

        return HtmlyResponses::success();
    }

}
