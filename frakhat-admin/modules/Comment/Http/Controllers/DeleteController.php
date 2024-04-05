<?php

namespace Modules\Comment\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Comment\Database\CommentStore;
use Modules\Comment\Facades\CommentProviderFacade;
use Modules\Comment\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        //get comment by id
        $comment = CommentProviderFacade::getCommentByid($id);
        CommentStore::destroy($comment);
        return HtmlyResponses::success();

    }
}
