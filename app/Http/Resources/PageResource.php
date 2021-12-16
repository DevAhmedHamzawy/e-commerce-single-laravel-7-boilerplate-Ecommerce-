<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        
        return [
            'name' => $this->{'name_' . $request->lang} ?? $this->name_ar,
            'description' => $this->{'description' . $request->lang} ?? $this->description_ar, 
        ];
    }
}
