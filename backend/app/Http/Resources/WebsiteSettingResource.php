<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WebsiteSettingResource extends JsonResource
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
            'from_email'        => $this->from_email,
            'to_email'          => $this->to_email,
            'website_title'     => $this->website_title,
            'phone_no'          => $this->phone_no,
            'phone_number'      => $this->getNumbersonly($this->phone_no),
            'toll_free'         => $this->toll_free,
            'toll_free_number'  => $this->getNumbersonly($this->toll_free),
            'facebook_link'     => $this->facebook_link,
            'twitter_link'      => $this->twitter_link,
            'linkedin_link'     => $this->linkedin_link,
            'copyright_text'    => $this->copyright_text,
            'address'           => $this->address,
            'header_logo'       => $this->logo != null ? asset('images/uploads/account/'.$this->logo) : asset('images/'.config('global.NO_IMAGE')),
            'footer_logo'       => $this->logo != null ? asset('images/uploads/account/'.$this->footer_logo) : asset('images/'.config('global.NO_IMAGE')),
        ];
    }

    /*
        * Function name : getNumbersonly
        * Purpose       : To get numbers only from string
    */
    private function getNumbersonly($phoneNumber) {
        if(!$phoneNumber) return '';

        return getNumbersFromString($phoneNumber);
    }

}
