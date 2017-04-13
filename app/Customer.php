<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = "customers";

    protected $fillable = ['id', 'customer_name', 'username', 'password', 
        'address', 'birthday', 'phonenumber', 'sex', 'email'];

    public function order(){
        return $this->hasMany('App\Order','customer_id','id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
