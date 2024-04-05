<?php

namespace Modules\Contact\Facades;

use Illuminate\Support\Facades\Facade;

class ContactProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Contact.services.contactProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
