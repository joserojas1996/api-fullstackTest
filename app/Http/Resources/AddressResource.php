<?php

namespace App\Http\Resources;

use App\Http\Resources\Tools\CommunesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            // 'id' => encrypt($this->id),
            'street'    => $this->street,
            'nro'       => $this->nro,
            'commune'   => $this->commune->name,
            'city'      => $this->commune->city->name
        ];
    }
}
