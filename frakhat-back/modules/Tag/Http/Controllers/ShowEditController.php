<?php

namespace Modules\Tag\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Language\Facades\LanguageProviderFacade;
use Modules\Tag\Facades\TagProviderFacade;
use Modules\Tag\Http\Responses\HtmlyResponses;

class ShowEditController extends Controller
{
    public function edit($id)
    {
        //get tag by id
        $tag = TagProviderFacade::getTagByid($id);
        $languages = LanguageProviderFacade::getAllLanguages();
        $data = [
            'tag' => $tag,
            'languages' => $languages
        ];
        //send response
        return HtmlyResponses::getDataResponse('tag::tag.edit', $data);
    }

}
