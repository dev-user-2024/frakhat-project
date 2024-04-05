<?php

namespace Modules\TeachingRequest\Http;

use Illuminate\Support\Facades\Facade;

class ResponderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'teachingRequest.http.responderFacade';
    }
    static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
