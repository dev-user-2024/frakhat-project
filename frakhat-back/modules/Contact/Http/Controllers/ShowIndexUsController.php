<?php

namespace Modules\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Contact\Facades\ContactProviderFacade;
use Modules\Contact\Http\Responses\HtmlyResponses;

class ShowIndexUsController extends Controller
{
    public function index()
    {
        //get contacts
        $contacts = ContactProviderFacade::getAllContactUs();
        $data = [
            'contacts' => $contacts
        ];
        //send response
        return HtmlyResponses::getDataResponse('contact::contactUs.index', $data);
    }

}
