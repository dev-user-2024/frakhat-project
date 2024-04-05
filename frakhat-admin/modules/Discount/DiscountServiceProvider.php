<?php

namespace Modules\Discount;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Discount\Facades\SlugProviderFacade;
use Modules\Discount\ProtectionLayers\Authenticator;
use Modules\Discount\Database\Models\Discount;
use Modules\Discount\Facades\DiscountProviderFacade;
use Modules\Discount\Http\ResponderFacade;
use Modules\Discount\Services\DiscountProvider;
use Modules\Discount\Http\Responses\HtmlyResponses;
use Modules\Discount\Services\SlugProvider;

class   DiscountServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\Discount\Http\Controllers';
    public function register()
    {
        DiscountProviderFacade::shouldProxyTo(DiscountProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('discounts', function () {
            return $this->hasMany(Discount::class);
        });
    }

    public function boot()
    {
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'discount');
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
