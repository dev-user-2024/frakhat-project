<?php

namespace Modules\Banner\Services;

use Modules\Banner\Database\Models\Banner;

class BannerProvider
{
    public function getAllBanners()
    {
        return  Banner::query()->get();
    }

    public function getBannerByid($id)
    {
        return Banner::query()->find($id);
    }
}
