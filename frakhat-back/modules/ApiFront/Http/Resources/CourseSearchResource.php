<?php

namespace Modules\ApiFront\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseSearchResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($course) {
                return [
                    'id' => $course->id,
                    'title' => $course->title_course,
                    'category' => $course->category->title,
                    'category_id' => $course->category->id,
                    'user_id' => $this->user_id,
                    'user' => $course->user->fullName,
                    'title_course' => $this->title_course,
                    'slug' => $this->slug,
                    'thumbnail_course' => $this->thumbnail_course,
                    'description_course' => $this->description_course,
                    'excerpt_course' => $this->excerpt_course,
                    'thumbnail2_course' => $this->thumbnail2_course,
                    'period_time_course' => $this->period_time_course,
                    'price_course' => $this->price_course,
                    'image_author' => $this->image_author,
                    'description_author' => $this->description_author,
                    'season_back' => $this->season_back,

                ];
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
