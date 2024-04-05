<?php

namespace Modules\Tag\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Tag\Database\TagStore;
use Modules\Tag\Http\Responses\HtmlyResponses;
use Modules\Tag\ProtectionLayers\ValidateForms;

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
        HeyMan::checkPoint('tag.update');
        //prepare data
        $data = request()->all();
        //update data
        $tag = TagStore::update($id, $data, auth()->id());
        return HtmlyResponses::success();

    }
}
