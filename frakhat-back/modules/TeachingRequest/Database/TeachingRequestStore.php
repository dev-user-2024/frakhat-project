<?php

namespace Modules\TeachingRequest\Database;

use Imanghafoori\Helpers\Nullable;
use Modules\TeachingRequest\Database\Models\TeachingRequest;

class TeachingRequestStore
{
    public static function store($data, $userId): Nullable
    {
        try {
            $teachingRequest = TeachingRequest::query()->create($data + ['user_id' => $userId]);
        } catch (\Exception $e) {
            return nullable();
        }

        if (! $teachingRequest->exists) {
            return nullable();
        }
        return nullable($teachingRequest);
    }


    public static function destroy($teachingRequest)
    {
        $teachingRequest->delete();
    }
}
