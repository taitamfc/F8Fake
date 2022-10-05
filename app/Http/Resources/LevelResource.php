<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LevelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /*
        Tra ve tat ca cac truong
        */
        //return parent::toArray($request);
        
        /*
        Tra ve chi cac truong can thiet
        */
        return [
            'id' => $this->id,
            'title' => $this->title,
            // Lay moi quan he courses trong model Level
            'courses' => $this->courses
        ];
    }
}
