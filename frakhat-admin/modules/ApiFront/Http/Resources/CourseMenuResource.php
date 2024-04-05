<?php

namespace Modules\ApiFront\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseMenuResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'title' => $this->title_course
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
