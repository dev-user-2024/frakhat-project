<?php

namespace Modules\Contact;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Contact\Facades\SlugProviderFacade;
use Modules\Contact\ProtectionLayers\Authenticator;
use Modules\Contact\Database\Models\Contact;
use Modules\Contact\Facades\ContactProviderFacade;
use Modules\Contact\Http\ResponderFacade;
use Modules\Contact\Services\ContactProvider;
use Modules\Contact\Http\Responses\HtmlyResponses;
use Modules\Contact\Services\SlugProvider;

class   ContactServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\Contact\Http\Controllers';
    public function register()
    {
        ContactProviderFacade::shouldProxyTo(ContactProvider::class);
        ResponderFacade::shouldProxyTo(HtmlyResponses::class);
        User::resolveRelationUsing('contacts', function () {
            return $this->hasMany(Contact::class);
        });
    }

    public function boot()
    {
        Authenticator::install();
        $this->defineWebRoutes();
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'contact');
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
