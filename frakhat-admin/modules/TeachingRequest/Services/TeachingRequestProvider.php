<?php

namespace Modules\TeachingRequest\Services;

use Modules\TeachingRequest\Database\Models\TeachingRequest;

class TeachingRequestProvider
{
    public function getAllTeachingRequests()
    {
        return  TeachingRequest::query()->get();
    }

    public function getTeachingRequestByid($id)
    {
        return TeachingRequest::query()->find($id);
    }
}
