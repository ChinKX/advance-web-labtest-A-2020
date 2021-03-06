<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ConferenceResource extends Resource
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
            'conf_id' => $this->conf_id,
            'name' => $this->name,
            'authors' => new AuthorCollection($this->whenLoaded('authors')),
            'papers' => new PaperCollection($this->whenLoaded('papers')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
