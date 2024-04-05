<?php

namespace Modules\Language\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Language\Database\LanguageStore;
use Modules\Language\Facades\LanguageProviderFacade;
use Modules\Language\Facades\SlugProviderFacade;
use Modules\Language\Http\ResponderFacade;
use Modules\Language\Http\Responses\HtmlyResponses;
use Modules\Language\ProtectionLayers\ValidateForms;

class ShowEditController extends Controller
{
    public function edit($id)
    {
        //get language by id
        $language = LanguageProviderFacade::getLanguageByid($id);
        $data = [
            'language' => $language
        ];
        //send response
        return HtmlyResponses::getDataResponse('language::language.edit', $data);
    }

}
