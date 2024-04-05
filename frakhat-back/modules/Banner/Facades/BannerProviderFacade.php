<?php

namespace Modules\Banner\Facades;

use Illuminate\Support\Facades\Facade;

class BannerProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Banner.services.bannerProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
