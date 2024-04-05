<?php

namespace Modules\Menu;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Menu\ProtectionLayers\Authenticator;
use Modules\Menu\Database\Models\Menu;
use Modules\Menu\Facades\MenuProviderFacade;
use Modules\Menu\Http\ResponderFacade;
use Modules\Menu\Services\MenuProvider;
use Modules\Menu\Http\Responses\HtmlyResponses;

class   MenuServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\Menu\Http\Controllers';
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/menu_config.php',
            'menu_config'
        );
        MenuProviderFacade::shouldProxyTo(MenuProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('menus', function () {
            return $this->hasMany(Menu::class);
        });
    }

    public function boot()
    {
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'menu');
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
