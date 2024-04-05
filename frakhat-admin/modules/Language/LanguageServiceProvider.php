<?php

namespace Modules\Language;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Language\Facades\SlugProviderFacade;
use Modules\Language\ProtectionLayers\Authenticator;
use Modules\Language\Database\Models\Language;
use Modules\Language\Facades\LanguageProviderFacade;
use Modules\Language\Http\ResponderFacade;
use Modules\Language\Services\LanguageProvider;
use Modules\Language\Http\Responses\HtmlyResponses;
use Modules\Language\Services\SlugProvider;

class   LanguageServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\Language\Http\Controllers';
    public function register()
    {
        LanguageProviderFacade::shouldProxyTo(LanguageProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('languages', function () {
            return $this->hasMany(Language::class);
        });
    }

    public function boot()
    {
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'language');
    }

    /**
     * @return void
     */
    public function defineWebRoutes(): void
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/routes.php');
    }
}
