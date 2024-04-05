<?php

namespace Modules\ApiFront\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LatestPostResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->postTranslations->first()->title,
            'slug' => $this->postTranslations->first()->slug,
            'summary' => $this->postTranslations->first()->summary,
            'content' => $this->postTranslations->first()->content,
            'image' => $this->image,
            'url' => $this->url,
            'short_link' => $this->short_link,
            'code' => $this->code,
            'like_count' => $this->like_count,
            'view_count' => $this->view_count,
            'user' => $this->user->fullName,
            'created_at' => $this->created_at,
            'galley' => $this->images,
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
