<?php

namespace Modules\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Contact\Database\ContactStore;
use Modules\Contact\Facades\ContactProviderFacade;
use Modules\Contact\Http\Responses\HtmlyResponses;

class DeleteController extends Controller
{
    public function delete($id)
    {
        //get contact by id
        $contact = ContactProviderFacade::getContactByid($id);
        ContactStore::destroy($contact);
        return HtmlyResponses::success();

    }
}
