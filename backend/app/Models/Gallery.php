<?php
/*****************************************************/
# Company Name      : Vishi Prem Workz
# Author            :
# Created Date      :
# Page/Class name   : Gallery
# Purpose           : Table declaration
/*****************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gallery extends Model
{
    use HasFactory, HasTranslations;

    public $timestamps = false;

    public $translatable = ['album_name'];

    protected $guarded = ['id'];    // The field name inside the array is not mass-assignable

    // protected $fillable = []; // Only the field names inside the array can be mass-assign
}