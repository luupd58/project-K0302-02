<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";

    protected $fillable = ['id', 'product_name', 'price', 'image', 'description'
    	, 'quantity', 'product_type_id', 'like', 'dislike', 'total_buy'];

    public function product_type(){
        return $this->belongsTo('App\Product_type','product_type_id','id');
    }

    public function promotion(){
        return $this->hasOne('App\Promotion','product_id','id');
    }
}
