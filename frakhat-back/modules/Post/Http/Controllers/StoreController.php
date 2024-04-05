<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use app\Services\Uploader\ImageUploader;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Category\Database\CategoryableStore;
use Modules\Image\Database\ImageStore;
use Modules\Post\Database\PostStore;
use Modules\Post\Database\ShortLinkStore;
use Modules\Post\Database\Transactioner;
use Modules\Post\Database\TranslationStore;
use Modules\Post\Http\Responses\HtmlyResponses;
use Modules\Post\ProtectionLayers\ValidateForms;
use Modules\Tag\Database\TaggableStore;
use Modules\Video\Database\VideoStore;

class StoreController extends Controller
{
    public function __construct()
    {
        ValidateForms::install();
        TranslationStore::install();
        CategoryableStore::install();
        TaggableStore::install();
        ShortLinkStore::install();
        ImageStore::install();
        VideoStore::install();

        resolve(StartGuarding::class)->start();
    }
    public function store()
    {
        //validate data
        HeyMan::checkPoint('post.store');

        //prepare data
        $data = request()->only(['type']);

        //create data
        $value = PostStore::store($data, auth()->id(), request()->file('image'));

        if ($value->getOr(null)['status'] == 'success') {
            return HtmlyResponses::success();
        } else {
            return HtmlyResponses::failedWithMessage($value->getOr(null));
        }
    }


}
