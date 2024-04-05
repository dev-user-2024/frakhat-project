<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Category\Database\CategoryStore;
use Modules\Category\Database\Transactioner;
use Modules\Category\Database\TranslationStore;
use Modules\Category\Http\Responses\HtmlyResponses;
use Modules\Category\ProtectionLayers\ValidateForms;

class StoreController extends Controller
{
    public function __construct()
    {
        ValidateForms::install();
        TranslationStore::install();

        resolve(StartGuarding::class)->start();
    }
    public function store()
    {
        //validate data
        HeyMan::checkPoint('category.store');
        //prepare data
        $data = request()->only(['parent_id', 'categoryable_type']);
        //create data
        CategoryStore::middlewared([Transactioner::class])
            ->store($data, auth()->id())
            ->getOrSend([HtmlyResponses::class, 'failed']);

        return HtmlyResponses::success();
    }

}
