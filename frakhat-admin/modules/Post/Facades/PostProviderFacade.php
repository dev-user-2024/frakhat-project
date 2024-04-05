<?php

namespace Modules\Post\Facades;

use Illuminate\Support\Facades\Facade;

class PostProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Post.services.postProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
