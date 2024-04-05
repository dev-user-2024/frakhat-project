<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CourseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($item){
            return [
                'id' => $item->id,
                'title_course' => $item->title_course,
                'slug' => $item->slug,
                'description_course' => $item->description_course,
                'background_season' => $item->background_season,
                'thumbnail_course' => $item->thumbnail_course,
                'thumbnail2_course' => $item->thumbnail2_course,
                'excerpt_course' => $item->excerpt_course,
            ];
        });
    }
}
