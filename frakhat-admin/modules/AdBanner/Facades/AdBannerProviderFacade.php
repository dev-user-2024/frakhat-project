<?php

namespace Modules\AdBanner\Facades;

use Illuminate\Support\Facades\Facade;

class AdBannerProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AdBanner.services.adBannerProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
