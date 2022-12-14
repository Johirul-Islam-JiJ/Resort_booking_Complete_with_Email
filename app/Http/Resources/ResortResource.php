<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResortResource extends JsonResource
{
    // public static $wrap = 'resorts';

    public function toArray($request)
    {
        return [
            'id' => $this -> id,
            'name' => $this -> name,
            'price' => $this-> price,
            'location' => $this -> location,
            'image' => $this-> image,


        ];
    }
}
