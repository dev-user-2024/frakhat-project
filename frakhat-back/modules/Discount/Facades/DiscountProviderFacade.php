<?php

namespace Modules\Discount\Facades;

use Illuminate\Support\Facades\Facade;

class DiscountProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'discount.services.discountProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
