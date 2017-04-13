<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_type extends Model
{
    //
    protected $table = "product_types";

    protected $fillable = ['id', 'product_type_name'];


    public function product(){
        return $this->hasMany('App\Product','product_type_id','id');
    }

    public function promotion(){
        return $this->hasOne('App\Promotion','product_type_id','id');
    }
}
