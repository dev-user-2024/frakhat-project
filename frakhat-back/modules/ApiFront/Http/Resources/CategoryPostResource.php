<?php

namespace Modules\ApiFront\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryPostResource extends JsonResource
{
    public function toArray($request)
    {
        return $this->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->postTranslations->first()->title,
                'slug' => $post->postTranslations->first()->slug,
                'summary' => $post->postTranslations->first()->summary,
                'content' => $post->postTranslations->first()->content,
                'image' => $post->image,
                'url' => $post->url,
                'short_link' => $post->short_link,
                'code' => $post->code,
                'like_count' => $post->like_count,
                'view_count' => $post->view_count,
                'user' => $post->user->fullName,
                'created_at' => $post->created_at,
            ];
        });

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
