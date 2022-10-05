<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LevelCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /*
        Tra ve tat ca du lieu
        */
        // return parent::toArray($request);
        
        /*
        Tuy bien du lieu tra ve
        */
        return [
            'data' => $this->collection,
            'count' => $this->collection->count()
        ];
    }
}
