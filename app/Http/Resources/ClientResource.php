<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'id'            =>  $this->id,
            'name'          =>  $this->name,
            'description'   =>  $this->when($this->description, $this->description),
            'hoursLogged'   =>  $this->hours_logged,
            'projects'      =>  \App\Http\Resources\ProjectResource::collection($this->whenLoaded('projects')),
            'users'         =>  \App\Http\Resources\ProfileResource::collection($this->whenLoaded('users')),
            // TODO: Icon
            // TODO: Members
            'url'           =>  route('client', $this->id),
        ];
    }
}
