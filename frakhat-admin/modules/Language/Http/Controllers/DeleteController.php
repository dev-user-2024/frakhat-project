<?php

namespace Modules\Language\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Language\Database\LanguageStore;
use Modules\Language\Facades\LanguageProviderFacade;
use Modules\Language\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        //get language by id
        $language = LanguageProviderFacade::getLanguageByid($id);
        LanguageStore::destroy($language);
        return HtmlyResponses::success();

    }
}
