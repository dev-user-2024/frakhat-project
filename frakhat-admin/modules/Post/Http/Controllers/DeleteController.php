<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Category\Database\CategoryableStore;
use Modules\Image\Database\ImageStore;
use Modules\Post\Database\PostStore;
use Modules\Post\Database\TranslationStore;
use Modules\Post\Facades\PostProviderFacade;
use Modules\Post\Http\Responses\HtmlyResponses;
use Modules\Tag\Database\TaggableStore;
use Modules\Video\Database\VideoStore;

class DeleteController extends Controller
{
    public function __construct()
    {
        TranslationStore::install();
        CategoryableStore::install();
        TaggableStore::install();
        ImageStore::install();
        VideoStore::install();

    }
    public function delete($id)
    {
        //get post by id
        $post = PostProviderFacade::getPostByid($id);
        PostStore::destroy($post);
        return HtmlyResponses::success();

    }
}
