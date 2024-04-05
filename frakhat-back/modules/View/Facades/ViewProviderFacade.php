<?php

namespace Modules\View\Facades;

use Illuminate\Support\Facades\Facade;

class ViewProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'View.services.viewProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
