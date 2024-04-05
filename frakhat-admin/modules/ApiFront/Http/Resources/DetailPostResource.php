<?php

namespace Modules\ApiFront\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailPostResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->postTranslations->first()->title,
            'slug' => $this->postTranslations->first()->slug,
            'summary' => $this->postTranslations->first()->summary,
            'content' => $this->postTranslations->first()->content,
            'type' => $this->type,
            'image' => $this->image,
            'url' => $this->url,
            'short_link' => $this->short_link,
            'code' => $this->code,
            'like_count' => $this->like_count,
            'view_count' => $this->view_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => $this->user->fullName,
            'gallery' => $this->images,
            'tags' => $this->tags->map(function ($tag) {
                return [
                    'id' => $tag->id,
                    'title' => $tag->tagTranslations->first()->title,
                    'slug' => $tag->tagTranslations->first()->slug,
                ];
            }),
            'categories' => $this->categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'title' => $category->categoryTranslations->first()->title,
                    'slug' => $category->categoryTranslations->first()->slug,
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
