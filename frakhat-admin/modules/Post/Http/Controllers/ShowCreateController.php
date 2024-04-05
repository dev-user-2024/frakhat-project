<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Language\Facades\LanguageProviderFacade;
use Modules\Post\Http\Responses\HtmlyResponses;
use Modules\Tag\Facades\TagProviderFacade;

class ShowCreateController extends Controller
{
    public function create($type)
    {
        //get categories
        $categories = CategoryProviderFacade::getCategoriesByStringType('Post');
        //get languages
        $languages = LanguageProviderFacade::getAllLanguages();
        //get tags
        $tags = TagProviderFacade::getAllTags();
        $data = [
            'type' => $type,
            'categories' => $categories,
            'languages' => $languages,
            'tags' => $tags

        ];
        //send response
        return HtmlyResponses::getDataResponse('post::post.create', $data);
    }

}
