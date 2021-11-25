<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'            => $this->id,
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'email'         => $this->email,
            'profile_pic'   => $this->profile_pic != null ? asset('images/uploads/account/thumbs/'.$this->profile_pic) : asset('images/'.config('global.USER_NO_IMAGE')),
            'auth_token'    => $this->auth_token,
        ];
    }
}
