<?php

namespace Modules\Post;

use App\Models\User;
use Modules\Post\ViewComponent\PostStatus;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Modules\Post\Facades\SlugProviderFacade;
use Modules\Post\ProtectionLayers\Authenticator;
use Modules\Post\Database\Models\Post;
use Modules\Post\Facades\PostProviderFacade;
use Modules\Post\Http\ResponderFacade;
use Modules\Post\Services\PostProvider;
use Modules\Post\Http\Responses\HtmlyResponses;
use Modules\Post\Services\SlugProvider;

class PostServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\Post\Http\Controllers';
    public function register()
    {
        PostProviderFacade::shouldProxyTo(PostProvider::class);
        SlugProviderFacade::shouldProxyTo(SlugProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('posts', function () {
            return $this->hasMany(Post::class);
        });
    }

    public function boot()
    {
        Blade::component('post-status', PostStatus::class);
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'post');
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
