<?php

namespace Modules\ApiFront;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\ApiFront\Facades\SlugProviderFacade;
use Modules\ApiFront\ProtectionLayers\Authenticator;
use Modules\ApiFront\Database\Models\ApiFront;
use Modules\ApiFront\Facades\ApiFrontProviderFacade;
use Modules\ApiFront\Http\ResponderFacade;
use Modules\ApiFront\Services\ApiFrontProvider;
use Modules\ApiFront\Http\Responses\HtmlyResponses;
use Modules\ApiFront\Services\SlugProvider;

class ApiFrontServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\ApiFront\Http\Controllers';
    public function register()
    {
        ApiFrontProviderFacade::shouldProxyTo(ApiFrontProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);

    }

    public function boot()
    {
        $this->defineWebRoutes();
    }

    /**
     * @return void
     */
    public function defineWebRoutes(): void
    {
        Route::middleware('api')
            ->prefix('api/v1/')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/routes.php');
    }
}
