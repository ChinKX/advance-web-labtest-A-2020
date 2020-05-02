<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AuthorResource extends Resource
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
            'id' => $this->id,
            'name' => $this->name,
            'conferences' => new ConferenceCollection($this->whenLoaded('conferences')),
            'papers' => new PaperCollection($this->whenLoaded('papers')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
