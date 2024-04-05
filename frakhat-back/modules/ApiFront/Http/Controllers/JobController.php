<?php

namespace Modules\ApiFront\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Province;
use Modules\ApiFront\Http\Resources\JobResource;
use Modules\ApiFront\Http\Resources\JobDetailResource;
use Modules\Job\Database\Models\Job;
use Modules\Job\Database\Models\JobGroup;

class JobController extends Controller
{

    public function getCourseJobs($courseId)
    {
        $jobs = Job::where('course_id', $courseId)->paginate(10);

        return JobResource::collection($jobs);
    }

    public function getLatestJobs()
    {
        $limit = request()->input('limit', 10);

        $jobs = Job::orderByDesc('created_at')->limit($limit)->get();

        return JobResource::collection($jobs);
    }

    public function index()
    {
        $jobs = Job::orderByDesc('created_at')->paginate(10);
        return JobResource::collection($jobs);
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return new JobDetailResource($job);
    }

    public function dataFilter()
    {
        $data[] = [];
        $data ['provinces'] = Province::all();
        $data ['job_groups'] = JobGroup::all();
        $data ['minimum_salary'] = [
            'توافقی',
            'کمتر از ۵ میلیون تومان',
            'بین ۵ تا ۱۰ میلیون تومان',
            'بین ۱۰ تا ۱۵ میلیون تومان',
            'بین ۱۵ تا ۲۰ میلیون تومان',
            'بیش از ۲۰ میلیون تومان',

        ];
        $data ['minimum_experience'] = [
            'بدون محدودیت',
            'کمتر از ۲ سال',
            'بین ۲ تا ۵ سال',
            'بین ۵ تا ۸ سال',
            'بیش از ۸ سال',
        ];
        return response()->json($data);
    }

    public function dataSearch()
    {
        $data[] = [];
        $data ['provinces'] = Province::all();
        $data ['job_groups'] = JobGroup::all();
        return response()->json($data);
    }


    public function jobSearch()
    {
        $location = request()->input('location');
        $jobGroup = request()->input('job_group');
        $title = request()->input('title');
        $companyName = request()->input('company_name');
        $sort = request()->input('sort');
        $minimumSalary = request()->input('minimum_salary');
        $minimumExperience = request()->input('minimum_experience');

        // Prepare the query builder
        $query = Job::query();

        // Apply the search conditions
        if (!empty($location)) {
            $query->where('location', 'LIKE', "%$location%");
        }

        if (!empty($jobGroup)) {
            $query->where('job_group', 'LIKE', "%$jobGroup%");
        }

        if (!empty($title)) {
            $query->where('title', 'LIKE', "%$title%");
        }

        if (!empty($companyName)) {
            $query->whereHas('company', function ($query) use ($companyName) {
                $query->where('name_fa', 'LIKE', "%$companyName%")
                    ->orWhere('name_en', 'LIKE', "%$companyName%");
            });
        }

        // Apply the minimum salary filter
        if (!empty($minimumSalary)) {
            $query->where('salary', 'LIKE', $minimumSalary);
        }

        // Apply the minimum experience filter
        if (!empty($minimumExperience)) {
            $query->where('experience', 'LIKE', $minimumExperience);
        }

        // Apply the sorting conditions
        if ($sort == 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($sort == 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        // Perform the search query
        $jobs = $query->get();

        // Return the search results
        return JobResource::collection($jobs);
    }


    public function searchJobs()
    {
        // Get the search parameters from the request
        $location = request()->input('location');
        $jobGroup = request()->input('job_group');
        $title = request()->input('title');
        $companyName = request()->input('company_name');

        // Prepare the query builder
        $query = Job::query();

        // Apply the search conditions
        if (!empty($location)) {
            $query->where('location', 'LIKE', "%$location%");
        }

        if (!empty($jobGroup)) {
            $query->where('job_group', 'LIKE', "%$jobGroup%");
        }

        if (!empty($title)) {
            $query->where('title', 'LIKE', "%$title%");
        }

        if (!empty($companyName)) {
            $query->whereHas('company', function ($query) use ($companyName) {
                $query->where('name_fa', 'LIKE', "%$companyName%")
                    ->orWhere('name_en', 'LIKE', "%$companyName%");
            });
        }

        // Perform the search query
        $jobs = $query->get();

        // Return the search results
        return JobResource::collection($jobs);
    }

    public function filterJob()
    {
        // Get the filter values from the request
        $filters = request()->only(['job_group', 'location', 'employment_type', 'minimum_salary', 'minimum_experience']);

        // Start with the base query
        $query = Job::query();

        // Apply the filters
        foreach ($filters as $field => $value) {
            if ($value) {
                $query->where($field, $value);
            }
        }

        // Get the filtered jobs
        $jobs = $query->get();

        // Return the filtered jobs
        return JobResource::collection($jobs);
    }

    public function orderByDate()
    {
        $sort = request()->input('sort');
        if ($sort == 'newest') {
            $jobs = Job::orderBy('created_at', 'desc')->get();
        } elseif ($sort == 'oldest') {
            $jobs = Job::orderBy('created_at', 'asc')->get();
        } else {
            $jobs = Job::all();
        }
        return JobResource::collection($jobs);

    }


}
