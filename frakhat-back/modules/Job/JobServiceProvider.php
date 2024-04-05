<?php

namespace Modules\Job;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Job\Facades\SlugProviderFacade;
use Modules\Job\ProtectionLayers\Authenticator;
use Modules\Job\Database\Models\Job;
use Modules\Job\Facades\JobProviderFacade;
use Modules\Job\Http\ResponderFacade;
use Modules\Job\Services\JobProvider;
use Modules\Job\Http\Responses\HtmlyResponses;
use Modules\Job\Services\SlugProvider;

class   JobServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\Job\Http\Controllers';
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/job_config.php',
            'job'
        );
        JobProviderFacade::shouldProxyTo(JobProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('jobs', function () {
            return $this->hasMany(Job::class);
        });
    }

    public function boot()
    {
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'job');
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
