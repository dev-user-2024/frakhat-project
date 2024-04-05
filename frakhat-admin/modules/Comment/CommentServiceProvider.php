<?php

namespace Modules\Comment;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Modules\Comment\ProtectionLayers\Authenticator;
use Modules\Comment\Database\Models\Comment;
use Modules\Comment\Facades\CommentProviderFacade;
use Modules\Comment\Http\ResponderFacade;
use Modules\Comment\Services\CommentProvider;
use Modules\Comment\Http\Responses\HtmlyResponses;
use Modules\Comment\ViewComponent\CommentStatus;


class   CommentServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\Comment\Http\Controllers';
    public function register()
    {
        CommentProviderFacade::shouldProxyTo(CommentProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('comments', function () {
            return $this->hasMany(Comment::class);
        });
    }

    public function boot()
    {

        Blade::component('comment-status', CommentStatus::class);

        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'comment');
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
