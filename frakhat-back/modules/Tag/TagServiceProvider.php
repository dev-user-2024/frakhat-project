<?php

namespace Modules\Tag;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Language\Database\Models\Language;
use Modules\Tag\Database\Models\TagTranslation;
use Modules\Tag\Services\SlugProvider;
use Modules\Tag\Facades\SlugProviderFacade;
use Modules\Tag\ProtectionLayers\Authenticator;
use Modules\Tag\Database\Models\Tag;
use Modules\Tag\Facades\TagProviderFacade;
use Modules\Tag\Http\ResponderFacade;
use Modules\Tag\Services\TagProvider;
use Modules\Tag\Http\Responses\HtmlyResponses;

class   TagServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\Tag\Http\Controllers';
    public function register()
    {
        TagProviderFacade::shouldProxyTo(TagProvider::class);
        SlugProviderFacade::shouldProxyTo(SlugProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('tags', function () {
            return $this->hasMany(Tag::class);
        });
//        Language::resolveRelationUsing('tagTranslations', function () {
//            return $this->hasMany(TagTranslation::class);
//        });
    }

    public function boot()
    {
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'tag');
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
