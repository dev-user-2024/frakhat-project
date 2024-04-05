<?php

namespace Modules\View;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\View\Facades\SlugProviderFacade;
use Modules\View\ProtectionLayers\Authenticator;
use Modules\View\Database\Models\View;
use Modules\View\Facades\ViewProviderFacade;
use Modules\View\Http\ResponderFacade;
use Modules\View\Services\ViewProvider;
use Modules\View\Http\Responses\HtmlyResponses;
use Modules\View\Services\SlugProvider;

class   ViewServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\View\Http\Controllers';
    public function register()
    {
        ViewProviderFacade::shouldProxyTo(ViewProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('views', function () {
            return $this->hasMany(View::class);
        });
    }

    public function boot()
    {
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'view');
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
