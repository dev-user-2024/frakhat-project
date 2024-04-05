<?php

namespace Modules\Comment\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Comment\Facades\CommentProviderFacade;
use Modules\Comment\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index($type)
    {
        //get comments
        $comments = CommentProviderFacade::getAllCommentsByType($type);
        $data = [
            'comments' => $comments,
            'type' => $type,
        ];
        //send response
        return HtmlyResponses::getDataResponse('comment::comment.index', $data);
    }

}
