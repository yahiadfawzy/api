<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class postRecource extends JsonResource
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
            'post_id'=> $this->id,
            'head'=> $this->title,
            'content'=> $this->body
        ];
    }
}
