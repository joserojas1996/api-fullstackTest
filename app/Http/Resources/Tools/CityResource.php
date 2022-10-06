<?php

namespace App\Http\Resources\Tools;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'id'    => encrypt($this->id),
            'name'  => $this->name,
        ];
    }
}
