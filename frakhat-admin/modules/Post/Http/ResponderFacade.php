<?php

namespace Modules\Post\Http;

use Illuminate\Support\Facades\Facade;

class ResponderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'post.http.responderFacade';
    }
    static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
