<?php

namespace Modules\Image;

use App\Models\User;
use Carbon\Laravel\ServiceProvider;
use Modules\Image\Database\Models\Image;
use Modules\Image\Facades\ImageProviderFacade;
use Modules\Image\Services\ImageProvider;

class   ImageServiceProvider extends ServiceProvider
{
    private $namespace = 'Modules\Image\Http\Controllers';
    public function register()
    {
        User::resolveRelationUsing('images', function () {
            return $this->hasMany(Image::class);
        });
    }

    public function boot()
    {
        $this->loadMigrationsFrom([
            base_path(__DIR__.'/Database/Migrations')
        ]);
        $this->loadViewsFrom(__DIR__.'/Views', 'image');
    }
}
