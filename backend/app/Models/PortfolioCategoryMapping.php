<?php
/*****************************************************/
# Company Name      : Vishi Prem Workz
# Author            : 
# Created Date      : 07-06-2021
# Page/Class name   : PortfolioCategoryMapping
# Purpose           : Table declaration
/*****************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategoryMapping extends Model
{
    use HasFactory;

    public $timestamps = false;

    /*
        * Function name : portfolioCategoryTitle
        * Purpose       : To get portfolio category title
        * Author        :
        * Created Date  :
        * Modified Date : 
        * Input Params  : 
        * Return Value  : 
    */
	public function portfolioCategoryTitle() {
		return $this->belongsTo('App\Models\PortfolioCategory', 'category_id')->select('title');
	}

}
