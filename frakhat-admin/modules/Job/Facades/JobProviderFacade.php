<?php

namespace Modules\Job\Facades;

use Illuminate\Support\Facades\Facade;

class JobProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Job.services.jobProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
