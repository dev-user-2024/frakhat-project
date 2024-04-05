<?php

namespace Modules\Category\Facades;

use Illuminate\Support\Facades\Facade;

class SlugProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Category.services.slugProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
