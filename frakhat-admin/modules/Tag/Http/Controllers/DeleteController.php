<?php

namespace Modules\Tag\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Tag\Database\TagStore;
use Modules\Tag\Facades\TagProviderFacade;
use Modules\Tag\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        //get tag by id
        $tag = TagProviderFacade::getTagByid($id);
        //check if has in other table
//        if ($tag->posts()->exists())
//            return HtmlyResponses::failed();
        //deleted
        TagStore::destroy($tag);
        return HtmlyResponses::success();

    }
}
