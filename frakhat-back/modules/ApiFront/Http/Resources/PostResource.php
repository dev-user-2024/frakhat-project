<?php

namespace Modules\ApiFront\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        $data = [];

        foreach ($this->resource['posts'] as $tabData) {
            $tabPosts = [];
            foreach ($tabData['posts'] as $post) {
                $tabPosts[] = [
                    'id' => $post['id'],
                    'title' => $post['title'],
                    'slug' => $post['slug'],
                    'summary' => $post['summary'],
                    'content' => $post['content'],
                    'image' => $post['image'],
                    'url' => $post['url'],
                    'short_link' => $post['short_link'],
                    'code' => $post['code'],
                    'like_count' => $post['like_count'],
                    'view_count' => $post['view_count'],
                    'user' => $post['user'],
                    'created_at' => $post['created_at'],
                    'video_url' => $post['videos'],
                ];
            }

            $data[] = [
                'section' => $tabData['section'],
                'tab' => $tabData['tab'],
                'type' => $tabData['type'],
                'title' => $tabData['title'],
                'posts' => $tabPosts,
            ];
        }

        return $data;
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
