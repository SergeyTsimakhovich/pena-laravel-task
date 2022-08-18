<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'article' => $this->resource->article,
            'name' => $this->resource->name,
            'status' => $this->resource->status,
            'data' => $this->resource->data,

        ];
    }
}
