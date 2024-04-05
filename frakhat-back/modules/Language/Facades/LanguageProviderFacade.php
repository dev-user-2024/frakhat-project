<?php

namespace Modules\Language\Facades;

use Illuminate\Support\Facades\Facade;

class LanguageProviderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Language.services.languageProvider';
    }
    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor(), $class);
    }
}
