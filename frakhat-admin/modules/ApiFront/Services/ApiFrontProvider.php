<?php

namespace Modules\ApiFront\Services;

use Modules\ApiFront\Database\Models\ApiFront;

class ApiFrontProvider
{
    public function getAllApiFronts()
    {
        return  ApiFront::query()->get();
    }

    public function getApiFrontByid($id)
    {
        return ApiFront::query()->find($id);
    }
}
