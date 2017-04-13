<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = "orders";

    protected $fillable = ['id', 'customer_id', 'total_cost', 'date_buy', 
    	'date_transfer', 'status', 'name_customer', 'phonenumber', 'address', 
    	'is_card', 'card'];

    public function customer(){
        return $this->belongsTo('App\Customer','customer_id','id');
    }

}
