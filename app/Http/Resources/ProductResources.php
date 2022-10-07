<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResources extends JsonResource
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
            'name'          => $this->name,
            'price'         => $this->price,
            'stock'      => $this->stock,
            'provider'      => ProviderResource::make($this->provider),
            'subsidiaries'  => SubsidiaryResources::collection($this->subsidiaries)
        ];
    }
}
