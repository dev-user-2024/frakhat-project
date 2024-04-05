<?php

namespace Modules\Language\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Language\Facades\LanguageProviderFacade;
use Modules\Language\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        //get languages
        $languages = LanguageProviderFacade::getAllLanguages();
        $data = [
            'languages' => $languages
        ];
        //send response
        return HtmlyResponses::getDataResponse('language::language.index', $data);
    }

}
