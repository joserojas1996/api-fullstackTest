<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleResources extends JsonResource
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
            'id'                => encrypt($this->id),
            'total'             => $this->total,
            'client'            => ClientResources::make($this->client),
            'vendor'            => VendorResources::make($this->user),
            'products'          => ProductResources::collection($this->products),
            'created_at'        => $this->created_at
        ];
    }
}
