<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($request->has('debug')) {
            return parent::toArray($request);
        }

        return [
            'id'                => $this->id,
            'title'             => $this->title,
            'slug'              => $this->slug,
            'short_title'       => $this->short_title,
            'list_page_title'   => $this->list_page_title,
            'short_description' => $this->short_description,
            'description'       => $this->description,
            'image'             => $this->image != null ? asset('images/uploads/service/'.$this->image) : asset('images/'.config('global.NO_IMAGE')),
            'service_image'     => $this->service_image != null ? asset('images/uploads/service/'.$this->service_image) : asset('images/'.config('global.NO_IMAGE')),
        ];
    }
}
