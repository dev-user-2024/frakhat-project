<?php

namespace Modules\CartItem;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\CartItem\Facades\SlugProviderFacade;
use Modules\CartItem\ProtectionLayers\Authenticator;
use Modules\CartItem\Database\Models\CartItem;
use Modules\CartItem\Facades\CartItemProviderFacade;
use Modules\CartItem\Http\ResponderFacade;
use Modules\CartItem\Services\CartItemProvider;
use Modules\CartItem\Http\Responses\HtmlyResponses;
use Modules\CartItem\Services\SlugProvider;

class   CartItemServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\CartItem\Http\Controllers';
    public function register()
    {
        CartItemProviderFacade::shouldProxyTo(CartItemProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('cartItems', function () {
            return $this->hasMany(CartItem::class);
        });
    }

    public function boot()
    {
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'cartItem');
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
