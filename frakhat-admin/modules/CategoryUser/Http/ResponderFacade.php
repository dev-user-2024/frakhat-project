<?php

namespace Modules\CategoryUser\Http;

use Illuminate\Support\Facades\Facade;

class ResponderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'categoryUser.http.responderFacade';
    }
    static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
