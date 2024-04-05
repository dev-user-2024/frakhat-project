<?php

namespace Modules\Job\Services;

use Modules\Job\Database\Models\Company;
use Modules\Job\Database\Models\Job;
use Modules\Job\Database\Models\Resume;

class JobProvider
{
    public function getAllResume()
    {
        return  Resume::query()->get();
    }

    public function getAllCompany()
    {
        return  Company::query()->get();
    }

    public function getCompanyByid($id)
    {
        return Company::query()->find($id);
    }
    public function getAllJobs()
    {
        return  Job::query()->get();
    }

    public function getJobByid($id)
    {
        return Job::query()->find($id);
    }
}
