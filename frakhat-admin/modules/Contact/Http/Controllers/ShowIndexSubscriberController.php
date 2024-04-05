<?php

namespace Modules\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Contact\Facades\ContactProviderFacade;
use Modules\Contact\Http\Responses\HtmlyResponses;

class ShowIndexSubscriberController extends Controller
{
    public function index()
    {
        //get contacts
        $contacts = ContactProviderFacade::getAllSubscriber();
        $data = [
            'contacts' => $contacts
        ];
        //send response
        return HtmlyResponses::getDataResponse('contact::subscriber.index', $data);
    }

}
