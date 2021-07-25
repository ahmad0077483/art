<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'=>$this->collection->map(function ($item){
                return[

                    'name'=> $item->name,
                    'parent'=> $item->parent,
                    'child'=> $item->child,

                ];
            })
        ];
    }
}
