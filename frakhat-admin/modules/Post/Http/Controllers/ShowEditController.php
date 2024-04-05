<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Language\Facades\LanguageProviderFacade;
use Modules\Post\Database\PostStore;
use Modules\Post\Facades\PostProviderFacade;
use Modules\Post\Facades\SlugProviderFacade;
use Modules\Post\Http\ResponderFacade;
use Modules\Post\Http\Responses\HtmlyResponses;
use Modules\Post\ProtectionLayers\ValidateForms;
use Modules\Tag\Facades\TagProviderFacade;

class ShowEditController extends Controller
{
    public function edit($id)
    {
        //get post by id
        $post = PostProviderFacade::getPostByid($id);
        //get categories
        $categories = CategoryProviderFacade::getCategoriesByStringType('Post');
        //get languages
        $languages = LanguageProviderFacade::getAllLanguages();
        //get tags
        $tags = TagProviderFacade::getAllTags();
        $data = [
            'post' => $post,
            'type' => $post->type,
            'categories' => $categories,
            'languages' => $languages,
            'tags' => $tags

        ];
        //send response
        return HtmlyResponses::getDataResponse('post::post.edit', $data);
    }

}
