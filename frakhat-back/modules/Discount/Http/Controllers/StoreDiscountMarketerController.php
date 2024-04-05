<?php

namespace Modules\Discount\Http\Controllers;

use App\Http\Controllers\Controller;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\Discount\Database\DiscountStore;
use Modules\Discount\Http\Responses\HtmlyResponses;
use Modules\Discount\ProtectionLayers\ValidateForms;

class StoreDiscountMarketerController extends Controller
{
    public function __construct()
    {
        ValidateForms::install();
        resolve(StartGuarding::class)->start();
    }
    public function store()
    {
        //validate data
        HeyMan::checkPoint('discount.marketer.store');
        //prepare data
        $data = request()->all();
        //create data
        $discount = DiscountStore::storeMarketer($data, auth()->id())
            ->getOrSend([HtmlyResponses::class, 'failed']);

        return HtmlyResponses::success();
    }

}
