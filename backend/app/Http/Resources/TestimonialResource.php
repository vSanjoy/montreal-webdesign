<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TestimonialResource extends JsonResource
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
            'title'         => $this->title,
            'author'        => $this->author,
            'designation'   => $this->designation,
            'description'   => $this->description,
            'image'         => $this->image != null ? asset('images/uploads/testimonial/'.$this->image) : asset('images/'.config('global.LOGO_NO_IMAGE')),
            'logo'          => $this->logo != null ? asset('images/uploads/testimonial/'.$this->logo) : '',
        ];
    }
}
