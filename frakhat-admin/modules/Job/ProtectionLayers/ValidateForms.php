<?php

namespace Modules\Job\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;
use Illuminate\Validation\Rule;

class ValidateForms
{
    public static function install()
    {

        // Validation rules for storing a job
        $storeJobRules = [
            'company_id' => 'required|exists:companies,id',
            'course_id' => 'required|exists:courses,id',
            'title' => 'required',
//            'location' => 'nullable',
//            'job_group' => 'nullable',
            'employment_type' => 'nullable',
            'minimum_salary' => 'nullable',
            'job_description' => 'required',
            'minimum_experience' => 'nullable',
            'gender' => ['nullable', Rule::in(['female', 'male', 'default'])],
            'military_status' => 'nullable',
            'insurance_status' => 'nullable',
        ];

        // Validation rules for updating a job
        $updateJobRules = [
            'company_id' => 'required|exists:companies,id',
            'course_id' => 'required|exists:courses,id',
            'title' => 'required',
//            'location' => 'nullable',
//            'job_group' => 'nullable',
            'employment_type' => 'nullable',
            'minimum_salary' => 'nullable',
            'job_description' => 'required',
            'minimum_experience' => 'nullable',
            'gender' => ['nullable', Rule::in(['female', 'male'])],
            'military_status' => 'nullable',
            'insurance_status' => 'nullable',
        ];

        // Apply validation rules to routes
        HeyMan::onCheckPoint(['job.store'])->validate($storeJobRules);
        HeyMan::onCheckPoint(['job.update'])->validate($updateJobRules);



        // Validation rules for storing a company
        $storeCompanyRules = [
            'name_fa' => 'required',
            'name_en' => 'required',
            'established_year' => 'required|integer',
            'logo' => 'required',
            'number_of_persons' => 'nullable',
            'description' => 'required',
            'address' => 'required',
            'industry' => 'required',
            'website' => 'required',
        ];

        // Validation rules for updating a company
        $updateCompanyRules = [
            'name_fa' => 'required',
            'name_en' => 'required',
            'established_year' => 'required|integer',
            'number_of_persons' => 'nullable',
            'description' => 'required',
            'address' => 'required',
            'industry' => 'required',
            'website' => 'required',
        ];

        // Apply validation rules to routes
        HeyMan::onCheckPoint(['company.store'])->validate($storeCompanyRules);
        HeyMan::onCheckPoint(['company.update'])->validate($updateCompanyRules);

    }
}
