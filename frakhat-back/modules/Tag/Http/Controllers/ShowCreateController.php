<?php

namespace Modules\Tag\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Language\Facades\LanguageProviderFacade;
use Modules\Tag\Http\Responses\HtmlyResponses;

class ShowCreateController extends Controller
{
    public function create()
    {
        //get languages
        $languages = LanguageProviderFacade::getAllLanguages();
        $data = [
            'languages' => $languages
        ];
        //send response
        return HtmlyResponses::getDataResponse('tag::tag.create', $data);
    }

}
