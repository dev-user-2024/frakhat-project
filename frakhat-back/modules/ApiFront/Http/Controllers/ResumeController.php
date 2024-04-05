<?php

namespace Modules\ApiFront\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Modules\ApiFront\Http\Resources\JobResource;
use Modules\Job\Database\Models\Job;
use Modules\Job\Database\Models\Resume;

class ResumeController extends Controller
{
    public function store()
    {
        try {
            $validatedData = request()->validate([
                'job_id' => [
                    'required',
                    Rule::exists('jobs', 'id')->where(function ($query) {
                        $query->where('status', 'active');
                    }),
                ],
                'resume' => 'required|file|mimes:pdf',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->errors(),
            ], 422);
        }

        if (request()->hasFile('resume')) {
            $resume = request()->file('resume');
            $path = $resume->store('upload/resumes');

            $resume = new Resume();
            $resume->user_id = Auth::user()->id;
            $resume->job_id = $validatedData['job_id'];
            $resume->file = $path;
            $resume->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Resume submitted successfully.',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Resume file not found.',
        ], 422);
    }
}
