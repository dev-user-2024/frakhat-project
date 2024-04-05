<?php

namespace Modules\Banner;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Banner\Facades\SlugProviderFacade;
use Modules\Banner\ProtectionLayers\Authenticator;
use Modules\Banner\Database\Models\Banner;
use Modules\Banner\Facades\BannerProviderFacade;
use Modules\Banner\Http\ResponderFacade;
use Modules\Banner\Services\BannerProvider;
use Modules\Banner\Http\Responses\HtmlyResponses;
use Modules\Banner\Services\SlugProvider;

class   BannerServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\Banner\Http\Controllers';
    public function register()
    {
        BannerProviderFacade::shouldProxyTo(BannerProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('banners', function () {
            return $this->hasMany(Banner::class);
        });
    }

    public function boot()
    {
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'banner');
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
