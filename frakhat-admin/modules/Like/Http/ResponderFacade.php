<?php

namespace Modules\Like\Http;

use Illuminate\Support\Facades\Facade;

class ResponderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'like.http.responderFacade';
    }
    static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
