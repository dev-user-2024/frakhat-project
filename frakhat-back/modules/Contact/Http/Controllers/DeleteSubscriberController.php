<?php

namespace Modules\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Contact\Database\ContactStore;
use Modules\Contact\Facades\ContactProviderFacade;
use Modules\Contact\Http\Responses\HtmlyResponses;

class DeleteSubscriberController extends Controller
{
    public function delete($id)
    {
        //get contact by id
        $contact = ContactProviderFacade::getSubscriberByid($id);
        ContactStore::destroy($contact);
        return HtmlyResponses::success();

    }
}
