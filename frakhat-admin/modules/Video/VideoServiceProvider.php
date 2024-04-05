<?php

namespace Modules\Video;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Modules\Video\Database\Models\Video;
use Modules\Video\Facades\VideoProviderFacade;
use Modules\Video\Services\VideoProvider;

class VideoServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\Video\Http\Controllers';
    public function register()
    {
        User::resolveRelationUsing('videos', function () {
            return $this->hasMany(Video::class);
        });
    }

    public function boot()
    {
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'video');
    }
}
