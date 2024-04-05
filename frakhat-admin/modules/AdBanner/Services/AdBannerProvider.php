<?php

namespace Modules\AdBanner\Services;

use Modules\AdBanner\Database\Models\AdBanner;
use Modules\AdBanner\Database\Models\CourseBanner;

class AdBannerProvider
{
    public function getAllAdBanners()
    {
        return  AdBanner::query()->get();
    }
    public function getAllCourseBanners()
    {
        return  CourseBanner::query()->get();
    }

    public function getAdBannerByid($id)
    {
        return AdBanner::query()->find($id);
    }
    public function getCourseBannerByid($id)
    {
        return CourseBanner::query()->find($id);
    }
}
