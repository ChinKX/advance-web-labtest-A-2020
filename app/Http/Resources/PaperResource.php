<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PaperResource extends Resource
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
            'paper_id' => $this->paper_id,
            'name' => $this->name,
            'author_id' => $this->author_id,
            'author' => new AuthorResource($this->whenLoaded('author')),
            'conf_id' => $this->conf_id,
            'conference' => new ConferenceResource($this->whenLoaded('conference')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
