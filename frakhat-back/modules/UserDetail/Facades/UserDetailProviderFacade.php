<?php

namespace Modules\UserDetail\Facades;

use Illuminate\Support\Facades\Facade;

class UserDetailProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'UserDetail.services.userDetailProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
