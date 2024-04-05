<?php

namespace Modules\ApiFront\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }

}
