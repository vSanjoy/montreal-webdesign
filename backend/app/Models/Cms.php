<?php
/*****************************************************/
# Company Name      : Vishi Prem Workz
# Author            :
# Created Date      :
# Page/Class name   : Cms
# Purpose           : Table declaration
/*****************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cms extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    public $translatable = ['page_name','title','short_title','short_description','description','other_description','banner_title','banner_short_title','banner_short_description'];
    protected $guarded = ['id'];    // The field name inside the array is not mass-assignable
    // protected $fillable = []; // Only the field names inside the array can be mass-assign
}
