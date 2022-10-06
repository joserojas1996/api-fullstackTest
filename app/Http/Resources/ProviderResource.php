<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
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
            'id'            => encrypt($this->id),
            'rut'           => $this->info->rut,
            'name'          => $this->info->name,
            'lastname'      => $this->info->lastname,
            'phone'         => $this->info->phone,
            'address'       => AddressResource::make($this->info->address),
            'url'           => $this->url_link,
            'created_at'    => $this->created_at->format('Y-m-d')
        ];
    }
}
