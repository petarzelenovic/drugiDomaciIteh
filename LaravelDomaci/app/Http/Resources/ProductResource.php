<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='Product';
     public function toArray($request)
    {
        return [
            'Id->'=>$this->resource->id,
            'Name->'=>$this->resource->name,
            'Desc->'=>$this->resource->description,
            'Price->'=>$this->resource->price,
            'Slug->'=>$this->resource->slug,
            'Brand->'=>new BrandResource($this->resource->brand),
            'User->'=>new UserResource($this->resource->user)
        ];
    }
}
