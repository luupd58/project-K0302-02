<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    protected $table = "promotions";

    protected $fillable = ['id', 'product_id', 'product_type_id', 
    	'promotion_name', 'percent', 'date_start', 'date_end'];


    public function product(){
        return $this -> belongsTo('App\Product','product_id','id');
    }

    public function product_type(){
        return $this -> belongsTo('App\Product_type','product_type_id','id');
    }


}
