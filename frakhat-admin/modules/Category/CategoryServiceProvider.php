<?php

namespace Modules\Category;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Category\Facades\SlugProviderFacade;
use Modules\Category\ProtectionLayers\Authenticator;
use Modules\Category\Database\Models\Category;
use Modules\Category\Facades\CategoryProviderFacade;
use Modules\Category\Http\ResponderFacade;
use Modules\Category\Services\CategoryProvider;
use Modules\Category\Http\Responses\HtmlyResponses;
use Modules\Category\Services\SlugProvider;

class CategoryServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\Category\Http\Controllers';
    public function register()
    {
        CategoryProviderFacade::shouldProxyTo(CategoryProvider::class);
        SlugProviderFacade::shouldProxyTo(SlugProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);

        // one-to-many relation
        User::resolveRelationUsing('categories', function () {
            return $this->hasMany(Category::class);
        });


    }

    public function boot()
    {
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'category');
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
