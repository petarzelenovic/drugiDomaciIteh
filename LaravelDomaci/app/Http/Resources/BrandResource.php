<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='Brand';
     public function toArray($request)
    {
        return [

            'Id->'=>$this->resource->id,
            'Name->'=>$this->resource->brandName,
            'Slug->'=>$this->resource->slug,
            'Category->'=>new CategoryResource($this->resource->category)
        ];
    }
}
