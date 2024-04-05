<?php

namespace Modules\ApiFront\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobDetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'location' => $this->province->title,
            'employment_type' => $this->employment_type,
            'minimum_salary' => $this->minimum_salary,
            'job_description' => $this->job_description,
            'minimum_experience' => $this->minimum_experience,
            'gender' => $this->gender,
            'military_status' => $this->military_status,
            'insurance_status' => $this->insurance_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'course' => $this->course->title_course,
            'company' => $this->company,
            'same_jobs' => $this->company->jobs,
            'job_group' => $this->jobGroups->map(function ($group) {
                return $group->pluck('title');
            }),
            'tags' => $this->tags->map(function ($tag) {
                return $tag->tagTranslations->pluck('title')->first();
            }),

        ];
    }
    public function withResponse($request, $response)
    {
        $response->setStatusCode(200);
        $response->setData([
            'status' => 'success',
            'data' => $response->getData(true)
        ]);
    }
}
