<?php

namespace Modules\Tag\Facades;

use Illuminate\Support\Facades\Facade;

class TagProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Tag.services.tagProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
