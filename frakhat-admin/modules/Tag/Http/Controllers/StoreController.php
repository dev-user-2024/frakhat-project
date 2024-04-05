<?php

namespace Modules\Tag\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Tag\Database\TagStore;
use Modules\Tag\Http\Responses\HtmlyResponses;
use Modules\Tag\ProtectionLayers\ValidateForms;

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
        HeyMan::checkPoint('tag.store');
        //prepare data
        $data = request()->all();
        //create data
        $tag = TagStore::store($data, auth()->id())
            ->getOrSend([HtmlyResponses::class, 'failed']);

        return HtmlyResponses::success();
    }

}
