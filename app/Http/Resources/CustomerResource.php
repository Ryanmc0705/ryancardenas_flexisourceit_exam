<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "fullname"  =>  $this->fullname,
            "email"     =>  $this->email,
            "username"  =>  $this->username,
            "gender"    =>  $this->gender,
            "country"   =>  $this->country,
            "city"      =>  $this->city,
            "phone"     =>  $this->phone
        ];
    }
}
