<?php

namespace Modules\CategoryUser\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\CategoryUser\Database\CategoryUserStore;
use Modules\CategoryUser\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        CategoryUserStore::destroy($id);
        return HtmlyResponses::success();

    }
}
