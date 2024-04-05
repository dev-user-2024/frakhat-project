<?php

namespace Modules\Job\Database;

use App\Services\Uploader\ImageUploader;
use Imanghafoori\Helpers\Nullable;
use Modules\Job\Database\Models\Company;
use Modules\Job\Database\Models\Job;
use Illuminate\Support\Facades\File;
use Modules\Job\Database\Models\Skill;
use Illuminate\Support\Facades\DB;


class JobStore
{
    public static function storeJob($data, $userId): Nullable
    {
        DB::beginTransaction();

        try {
            $dataJob = [
                'user_id' => $userId,
                'company_id' => $data['company_id'],
                'course_id' => $data['course_id'],
                'title' => $data['title'],
                'province_id' => $data['province_id'],
                'employment_type' => $data['employment_type'],
                'minimum_salary' => $data['minimum_salary'],
                'job_description' => $data['job_description'],
                'minimum_experience' => $data['minimum_experience'],
                'gender' => $data['gender'],
                'military_status' => $data['military_status'],
                'insurance_status' => $data['insurance_status'],
            ];
            $job = Job::create($dataJob);

            $jobGroups = $data['job_group_id'];
            $job->jobGroups()->attach($jobGroups);

            $skills = $data['skills'];
            if ($skills) {
                foreach ($skills as $skillName) {
                    $skill = Skill::firstOrCreate(['title' => $skillName]);
                    $job->skills()->attach($skill->id);
                }
            }

            DB::commit(); // Commit the transaction
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            return nullable();
        }

        if (! $job->exists) {
            return nullable();
        }
        return nullable($job);
    }



    public static function updateJob($jobId, $data, $userId): Nullable
    {
        DB::beginTransaction();

        try {
            $job = Job::findOrFail($jobId);

            $updatedData = [
                'company_id' => $data['company_id'],
                'course_id' => $data['course_id'],
                // Other fields
            ];

            $job->update($updatedData);

            $jobGroups = $data['job_group_id'];
            $job->jobGroups()->sync($jobGroups);

            $skills = $data['skills'];
            if ($skills) {
                foreach ($skills as $skillName) {
                    $skill = Skill::firstOrCreate(['title' => $skillName]);
                    $job->skills()->syncWithoutDetaching($skill->id);
                }
            }

            DB::commit(); // Commit the transaction
            return nullable($job); // Confirm the job update
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            return nullable(); // Return null to indicate rollback
        }
    }


    public static function storeCompany($data, $userId): Nullable
    {
        try {
            //upload image
            $image = ImageUploader::upload(request()->file('logo'), 'companies/images/', null, 800, 600, true);
            $company = Company::query()->create($data + ['user_id' => $userId, 'logo' => $image]);

        } catch (\Exception $e) {
            return nullable();
        }

        if (! $company->exists) {
            return nullable();
        }
        return nullable($company);
    }
    public static function updateCompany($id, $data, $userId)
    {
        try {
            $company = Company::findOrFail($id);
            if (request()->file('logo'))
            {
                $image = ImageUploader::upload(request()->file('logo'), 'companies/images/', null, 800, 600, true);
                if (File::exists($company->logo))
                    File::delete($company->logo);

                $company->update([
                    'user_id' => $userId,
                    'logo' => $image,
                    'name_fa' => $data['name_fa'],
                    'name_en' => $data['name_en'],
                    'established_year' => $data['established_year'],
                    'number_of_persons' => $data['number_of_persons'],
                    'description' => $data['description'],
                    'address' => $data['address'],
                    'industry' => $data['industry'],
                    'website' => $data['website'],

                ]);
            }
            else {
                Company::where('id', $id)
                    ->update($data + ['user_id' => $userId]);
            }

        } catch (\Exception $e){
            $response = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
            return nullable($response);
        }

        $response = [
            'status' => 'success',
            'message' => $company
        ];
        return nullable($response);
    }

    public static function destroy($item)
    {
        $item->delete();
    }
}
