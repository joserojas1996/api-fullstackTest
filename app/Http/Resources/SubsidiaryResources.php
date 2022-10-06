<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubsidiaryResources extends JsonResource
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
            'name'              => $this->name,
            'iso'               => $this->iso,
            'currency'          => $this->currency_name,
            'currency_code'     => $this->currency_code,
            'currency_symbol'   => $this->currency_symbol 
        ];
    }
}
