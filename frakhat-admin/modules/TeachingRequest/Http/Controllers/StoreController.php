<?php

namespace Modules\TeachingRequest\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\TeachingRequest\Database\TeachingRequestStore;
use Modules\TeachingRequest\Http\Responses\HtmlyResponses;
use Modules\TeachingRequest\ProtectionLayers\ValidateForms;

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
        HeyMan::checkPoint('teachingRequest.store');
        //prepare data
        $data = request()->all();
        //create data
        $teachingRequest = TeachingRequestStore::store($data, auth()->id())
            ->getOrSend([HtmlyResponses::class, 'failed']);

        return HtmlyResponses::success();
    }

}
