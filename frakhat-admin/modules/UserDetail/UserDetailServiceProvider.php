<?php

namespace Modules\UserDetail;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\UserDetail\ProtectionLayers\Authenticator;
use Modules\UserDetail\Database\Models\UserDetail;
use Modules\UserDetail\Facades\UserDetailProviderFacade;
use Modules\UserDetail\Http\ResponderFacade;
use Modules\UserDetail\Services\UserDetailProvider;
use Modules\UserDetail\Http\Responses\HtmlyResponses;

class   UserDetailServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\UserDetail\Http\Controllers';
    public function register()
    {
        UserDetailProviderFacade::shouldProxyTo(UserDetailProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('userDetail', function () {
            return $this->hasOne(UserDetail::class);
        });
    }

    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/Lang', 'UserDetail');
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'userDetail');
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
