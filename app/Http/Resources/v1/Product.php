<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'title' => $this->title,
        'description'=> $this->description,
            'price'=> $this->price,
            'image'=>$this->image,
            'createTime' => jdate($this->created_at)->format('Y M d'),

            'categories'=> new CategoryCollection($this->categories),

    ];
    }
}
