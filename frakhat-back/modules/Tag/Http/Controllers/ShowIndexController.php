<?php

namespace Modules\Tag\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Language\Facades\LanguageProviderFacade;
use Modules\Tag\Facades\TagProviderFacade;
use Modules\Tag\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        //get tags
        $tags = TagProviderFacade::getAllTags();
        $languages = LanguageProviderFacade::getAllLanguages();
        $data = [
            'tags' => $tags,
            'languages' => $languages
        ];
        //send response
        return HtmlyResponses::getDataResponse('tag::tag.index', $data);
    }

}
