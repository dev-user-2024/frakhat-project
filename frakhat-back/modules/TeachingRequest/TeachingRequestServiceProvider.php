<?php

namespace Modules\TeachingRequest;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Modules\TeachingRequest\Facades\SlugProviderFacade;
use Modules\TeachingRequest\ProtectionLayers\Authenticator;
use Modules\TeachingRequest\Database\Models\TeachingRequest;
use Modules\TeachingRequest\Facades\TeachingRequestProviderFacade;
use Modules\TeachingRequest\Http\ResponderFacade;
use Modules\TeachingRequest\Services\TeachingRequestProvider;
use Modules\TeachingRequest\Http\Responses\HtmlyResponses;
use Modules\TeachingRequest\Services\SlugProvider;
use Modules\TeachingRequest\ViewComponent\TeachingRequestStatus;

class   TeachingRequestServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\TeachingRequest\Http\Controllers';
    public function register()
    {
        TeachingRequestProviderFacade::shouldProxyTo(TeachingRequestProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('teachingRequests', function () {
            return $this->hasMany(TeachingRequest::class);
        });
    }

    public function boot()
    {
        Blade::component('teachingRequest-status', TeachingRequestStatus::class);
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'teachingRequest');
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
