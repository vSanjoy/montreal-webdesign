<?php
/*****************************************************/
# Company Name      : Vishi Prem Workz
# Author            :
# Created Date      :
# Page/Class name   : Testimonial
# Purpose           : Table declaration
/*****************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    public $translatable = ['title','author','designation','description'];

    protected $guarded = ['id'];    // The field name inside the array is not mass-assignable

    // protected $fillable = []; // Only the field names inside the array can be mass-assign
    
}
