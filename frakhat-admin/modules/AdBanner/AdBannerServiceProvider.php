<?php

namespace Modules\AdBanner;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\AdBanner\Facades\SlugProviderFacade;
use Modules\AdBanner\ProtectionLayers\Authenticator;
use Modules\AdBanner\Database\Models\AdBanner;
use Modules\AdBanner\Facades\AdBannerProviderFacade;
use Modules\AdBanner\Http\ResponderFacade;
use Modules\AdBanner\Services\AdBannerProvider;
use Modules\AdBanner\Http\Responses\HtmlyResponses;
use Modules\AdBanner\Services\SlugProvider;

class   AdBannerServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\AdBanner\Http\Controllers';
    public function register()
    {
        AdBannerProviderFacade::shouldProxyTo(AdBannerProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('adBanners', function () {
            return $this->hasMany(AdBanner::class);
        });
    }

    public function boot()
    {
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'adBanner');
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
