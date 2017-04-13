<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    //
    protected $table = "advertises";

    protected $fillable = ['id', 'advertise_name', 'advertise_image', 
    	'advertise_link', 'description', 'date_start', 'date_end'];

}
