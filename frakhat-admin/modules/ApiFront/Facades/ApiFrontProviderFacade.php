<?php

namespace Modules\ApiFront\Facades;

use Illuminate\Support\Facades\Facade;

class ApiFrontProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ApiFront.services.languageProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
