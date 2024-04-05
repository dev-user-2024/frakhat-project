<?php

namespace Modules\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Contact\Facades\ContactProviderFacade;
use Modules\Contact\Http\Responses\HtmlyResponses;

class ShowIndexController extends Controller
{
    public function index()
    {
        //get contacts
        $contacts = ContactProviderFacade::getAllContacts();
        $data = [
            'contacts' => $contacts
        ];
        //send response
        return HtmlyResponses::getDataResponse('contact::contact.index', $data);
    }

}
