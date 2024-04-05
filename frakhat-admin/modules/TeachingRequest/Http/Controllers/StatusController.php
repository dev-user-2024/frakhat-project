<?php

namespace Modules\TeachingRequest\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\TeachingRequest\Database\Models\TeachingRequest;


class StatusController extends Controller
{
    public function approve(TeachingRequest $teachingRequest)
    {
        $teachingRequest->update(['status' => 'approved']);

        return back();
    }

    public function reject(TeachingRequest $teachingRequest)
    {
        $teachingRequest->update(['status' => 'rejected']);

        return back();
    }
}
