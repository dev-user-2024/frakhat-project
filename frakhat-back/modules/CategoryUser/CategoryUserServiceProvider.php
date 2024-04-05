<?php

namespace Modules\CategoryUser;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Category\Database\Models\Category;
use Modules\CategoryUser\ProtectionLayers\Authenticator;
use Modules\CategoryUser\Facades\CategoryUserProviderFacade;
use Modules\CategoryUser\Http\ResponderFacade;
use Modules\CategoryUser\Services\CategoryUserProvider;
use Modules\CategoryUser\Http\Responses\HtmlyResponses;

class   CategoryUserServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\CategoryUser\Http\Controllers';
    public function register()
    {
        CategoryUserProviderFacade::shouldProxyTo(CategoryUserProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);

        // many-to-many relation
//        User::resolveRelationUsing('categoryUsers', function () {
//            return $this->belongsToMany(Category::class, 'category_users', 'user_id', 'category_id');
//        });

    }

    public function boot()
    {
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'categoryUser');
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
