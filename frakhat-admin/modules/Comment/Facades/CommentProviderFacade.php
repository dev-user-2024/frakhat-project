<?php

namespace Modules\Comment\Facades;

use Illuminate\Support\Facades\Facade;

class CommentProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Comment.services.commentProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
