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
use Modules\Video\Database\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class ShowIndexController extends Controller
{

    public function index($type)
    {
        //get posts
        $languages = LanguageProviderFacade::getAllLanguages();
        $data = [
            'type' => $type,
            'languages' => $languages,
        ];
        //send response
        return HtmlyResponses::getDataResponse('post::post.index', $data);
    }


}
