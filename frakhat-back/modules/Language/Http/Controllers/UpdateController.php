<?php

namespace Modules\Language\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Language\Database\LanguageStore;
use Modules\Language\Http\Responses\HtmlyResponses;
use Modules\Language\ProtectionLayers\ValidateForms;

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
        HeyMan::checkPoint('language.update');
        //prepare data
        $data = request()->only(['title', 'code']);
        //update data
        $language = LanguageStore::update($id, $data, auth()->id());
        return HtmlyResponses::success();

    }
}
