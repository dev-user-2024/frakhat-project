<?php

namespace Modules\Category\Facades;

use Illuminate\Support\Facades\Facade;

class CategoryProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Category.services.categoryProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
