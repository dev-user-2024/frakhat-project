<?php

namespace Modules\ApiFront\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\AdBanner\Database\Models\AdBanner;
use Modules\ApiFront\Http\Resources\AdBannerResource;
use Modules\ApiFront\Http\Resources\MenuResource;
use Modules\ApiFront\Http\Resources\PostResource;
use Modules\Menu\Database\Models\Menu;
use Modules\Menu\Database\Models\Section;
use Modules\Menu\Database\Models\Tab;
use Modules\Post\Database\Models\Post;

class AdBannerController extends Controller
{

    public function getBannerList()
    {
        // Get the position parameter from the request
        $position = request()->input('position');

        // Start with the base query
        $query = AdBanner::query();

        // Apply filter based on the position
        if ($position) {
            $query->where('position', $position);
        }

        // Get the filtered banners
        $adBanners = $query->get();

        // Return the filtered banners
        return AdBannerResource::collection($adBanners);
    }

}
