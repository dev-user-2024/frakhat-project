<?php

namespace Modules\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Contact\Facades\ContactProviderFacade;
use Modules\Contact\Http\Responses\HtmlyResponses;

class ShowIndexMarketingController extends Controller
{
    public function index()
    {
        //get contacts
        $contacts = ContactProviderFacade::getAllContactMarketing();
        $data = [
            'contacts' => $contacts
        ];
        //send response
        return HtmlyResponses::getDataResponse('contact::contactMarketing.index', $data);
    }

}
