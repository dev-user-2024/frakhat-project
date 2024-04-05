<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use app\Services\Uploader\ImageUploader;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Category\Database\CategoryableStore;
use Modules\Image\Database\ImageStore;
use Modules\Post\Database\PostStore;
use Modules\Post\Database\Transactioner;
use Modules\Post\Database\TranslationStore;
use Modules\Post\Http\Responses\HtmlyResponses;
use Modules\Post\ProtectionLayers\ValidateForms;
use Modules\Tag\Database\TaggableStore;
use Modules\Video\Database\VideoStore;

class UpdateController extends Controller
{
    public function __construct()
    {
        ValidateForms::install();
        TranslationStore::install();
        CategoryableStore::install();
        TaggableStore::install();
        ImageStore::install();
        VideoStore::install();

        resolve(StartGuarding::class)->start();
    }
    public function update($id)
    {
        //validate data
        HeyMan::checkPoint('post.update');
        //prepare data
        $data = request()->only(['type']);
        if(request()->file('image'))
        {
            $post = PostStore::update($id, $data, auth()->id(), request()->file('image'));
        } else{
            $post = PostStore::update($id, $data, auth()->id());
        }
        return HtmlyResponses::success();

    }


}
