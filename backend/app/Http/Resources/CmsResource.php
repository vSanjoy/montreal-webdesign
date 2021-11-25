<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CmsResource extends JsonResource
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
            'title'                     => $this->title,
            'short_title'               => $this->short_title,
            'short_description'         => $this->short_description,
            'description'               => $this->description,
            'other_description'         => $this->other_description,
            'banner_title'              => $this->banner_title,
            'banner_short_title'        => $this->banner_short_title,
            'banner_short_description'  => $this->banner_short_description,
            'banner_image'              => $this->banner_image != null ? asset('images/uploads/cms/'.$this->banner_image) : asset('images/'.config('global.NO_IMAGE')),
            'featured_image'            => $this->featured_image != null ? asset('images/uploads/cms/'.$this->featured_image) : asset('images/'.config('global.NO_IMAGE')),
            'other_image'               => $this->other_image != null ? asset('images/uploads/cms/'.$this->other_image) : asset('images/'.config('global.NO_IMAGE')),
        ];
    }
}
