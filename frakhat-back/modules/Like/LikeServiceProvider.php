<?php

namespace Modules\Like;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Like\Facades\SlugProviderFacade;
use Modules\Like\ProtectionLayers\Authenticator;
use Modules\Like\Database\Models\Like;
use Modules\Like\Facades\LikeProviderFacade;
use Modules\Like\Http\ResponderFacade;
use Modules\Like\Services\LikeProvider;
use Modules\Like\Http\Responses\HtmlyResponses;
use Modules\Like\Services\SlugProvider;

class   LikeServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\Like\Http\Controllers';
    public function register()
    {
        LikeProviderFacade::shouldProxyTo(LikeProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('likes', function () {
            return $this->hasMany(Like::class);
        });
    }

    public function boot()
    {
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'like');
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
