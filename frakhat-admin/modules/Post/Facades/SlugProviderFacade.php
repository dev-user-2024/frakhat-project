<?php

namespace Modules\Post\Facades;

use Illuminate\Support\Facades\Facade;

class SlugProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Post.services.slugProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
