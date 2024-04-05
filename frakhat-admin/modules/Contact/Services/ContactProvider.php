<?php

namespace Modules\Contact\Services;

use Modules\Contact\Database\Models\Contact;
use Modules\Contact\Database\Models\ContactMarketing;
use Modules\Contact\Database\Models\ContactUs;
use Modules\Contact\Database\Models\Subscriber;

class ContactProvider
{
    public function getAllContactMarketing()
    {
        return  ContactMarketing::query()->get();
    }
    public function getAllContacts()
    {
        return  Contact::query()->get();
    }

    public function getContactByid($id)
    {
        return Contact::query()->find($id);
    }

    public function getAllContactUs()
    {
        return  ContactUs::query()->get();
    }

    public function getContactUsByid($id)
    {
        return ContactUs::query()->find($id);
    }

    public function getAllSubscriber()
    {
        return  Subscriber::query()->get();
    }

    public function getSubscriberByid($id)
    {
        return Subscriber::query()->find($id);
    }
}
