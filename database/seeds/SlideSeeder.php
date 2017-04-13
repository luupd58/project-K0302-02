<?php

use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
    		'name_slider' => "slide số 1",
    		"image_slider" => "customer/images/slider/slider-01.jpg",
    	]);
    	DB::table('slides')->insert([
    		'name_slider' => "slide số 2",
    		"image_slider" => "customer/images/slider/slider-02.jpg",
    	]);
    	DB::table('slides')->insert([
    		'name_slider' => "slide số 3",
    		"image_slider" => "customer/images/slider/slider-03.jpg",
    	]);
    	DB::table('slides')->insert([
    		'name_slider' => "slide số 4",
    		"image_slider" => "customer/images/slider/slider-04.jpg",
    	]);
    }
}
