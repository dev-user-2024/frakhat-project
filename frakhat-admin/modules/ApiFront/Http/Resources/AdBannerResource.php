<?php

namespace Modules\ApiFront\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdBannerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'position' => $this->position,
            'image' => $this->image,
            'link' => $this->link,
            'created_at' => $this->created_at,
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
