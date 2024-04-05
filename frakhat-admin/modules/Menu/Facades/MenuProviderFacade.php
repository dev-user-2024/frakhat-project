<?php

namespace Modules\Menu\Facades;

use Illuminate\Support\Facades\Facade;

class MenuProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Menu.services.menuProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
