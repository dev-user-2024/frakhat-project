<?php

namespace Modules\CategoryUser\Facades;

use Illuminate\Support\Facades\Facade;

class CategoryUserProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CategoryUser.services.categoryUserProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
