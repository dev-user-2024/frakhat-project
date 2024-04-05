<?php

namespace Modules\CartItem\Facades;

use Illuminate\Support\Facades\Facade;

class CartItemProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CartItem.services.cartItemProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
