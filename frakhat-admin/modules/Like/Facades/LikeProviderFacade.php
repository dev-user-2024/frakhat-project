<?php

namespace Modules\Like\Facades;

use Illuminate\Support\Facades\Facade;

class LikeProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Like.services.likeProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
