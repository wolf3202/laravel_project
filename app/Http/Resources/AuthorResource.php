<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
            'id' => (int)$this->id,
            'name' => $this->name,
            'age' => $this->age,
            'sex' => $this->sex,
            'avatar' => $this->avatar_url,
            'interest_ids' => $this->interests->pluck('id'),
        ];
    }
}
