<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Category\Database\CategoryStore;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Category\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        //get category by id
        $category = CategoryProviderFacade::getCategoryByid($id);
        $status = CategoryStore::destroy($category);
        if($status != 'success')
            return  HtmlyResponses::failedWithMassage($status);

        return HtmlyResponses::success();

    }
}
