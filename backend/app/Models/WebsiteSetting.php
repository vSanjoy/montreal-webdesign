<?php
/*****************************************************/
# Company Name      : Vishi Prem Workz
# Author            :
# Created Date      :
# Class name        : WebsiteSetting
# Purpose           : Table declaration
/*****************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WebsiteSetting extends Model
{
    use HasFactory, HasTranslations;

    public $timestamps    = false;

    public $translatable  = ['website_title','address','footer_address','copyright_text','tag_line'];

    protected $guarded    = ['id'];    // The field name inside the array is not mass-assignable
}
