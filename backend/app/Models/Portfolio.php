<?php
/*****************************************************/
# Company Name      : Vishi Prem Workz
# Author            : 
# Created Date      : 07-06-2021
# Page/Class name   : Portfolio
# Purpose           : Table declaration
/*****************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    public $translatable = ['title','short_title','roles','short_description','description'];

    protected $guarded = ['id'];    // The field name inside the array is not mass-assignable

    /*
        * Function name : portfolioCategoryMapping
        * Purpose       : To get portfolio categories
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : 
        * Return Value  : 
    */
	public function portfolioCategoryMapping() {
		return $this->hasMany('App\Models\PortfolioCategoryMapping', 'portfolio_id');
	}

    /*
        * Function name : portfolioCategoryMappingDetails
        * Purpose       : To get portfolio categories
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : 
        * Return Value  : 
    */
	public function portfolioCategoryMappingDetails() {
		return $this->hasMany('App\Models\PortfolioCategoryMapping', 'portfolio_id');
	}

}
