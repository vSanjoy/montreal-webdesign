<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
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
            'title'             => $this->title,
            'site_link'         => $this->site_link,
            'short_title'       => $this->short_title,
            'roles'             => $this->roles,
            'short_description' => $this->short_description,
            'is_featured'       => $this->is_featured,
            'image'             => $this->image != null ? asset('images/uploads/portfolio/'.$this->image) : asset('images/'.config('global.NO_IMAGE')),
        ];
    }
}
