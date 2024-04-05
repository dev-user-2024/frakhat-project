<?php

namespace Modules\TeachingRequest\Facades;

use Illuminate\Support\Facades\Facade;

class TeachingRequestProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TeachingRequest.services.teachingRequestProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
