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
            // TODO: Icon
            // TODO: Members
            // TODO: URL
        ];
    }
}
