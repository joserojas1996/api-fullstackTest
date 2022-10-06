<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class UserAuth extends JsonResource
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
            'name'  => $this->info->name,
            'lastname' => $this->info->lastname,
            'email' => $this->email
        ];
    }
}
