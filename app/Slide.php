<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = "slides";

    protected $fillable = ['id', 'name_slider', 'image_slider'];
}
