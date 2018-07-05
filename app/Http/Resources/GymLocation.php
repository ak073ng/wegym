<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GymLocation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return[
            'name' => $this->name,
            'location' => $this->location,
            'description' => $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ];
    }
}
