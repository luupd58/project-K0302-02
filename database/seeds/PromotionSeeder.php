<?php

use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
    		'product_id' => 2,
    		"product_type_id" => 1,
    		"promotion_name" => "KM bánh sinh nhật",
    		"percent" => 15,
    		"date_start" => "2017-04-20",
    		"date_end" => "2017-04-24"
    	]);
    	DB::table('promotions')->insert([
    		'product_id' => 3,
    		"product_type_id" => 2,
    		"promotion_name" => "KM bánh nhân dâu",
    		"percent" => 15,
    		"date_start" => "2017-04-20",
    		"date_end" => "2017-04-24"
    	]);
    	DB::table('promotions')->insert([
    		'product_id' => 1,
    		"product_type_id" => 3,
    		"promotion_name" => "KM bánh hoa quả",
    		"percent" => 15,
    		"date_start" => "2017-04-20",
    		"date_end" => "2017-04-24"
    	]);
    	DB::table('promotions')->insert([
    		'product_id' => 5,
    		"product_type_id" => 4,
    		"promotion_name" => "KM bánh đám cưới",
    		"percent" => 15,
    		"date_start" => "2017-04-20",
    		"date_end" => "2017-04-24"
    	]);
    	DB::table('promotions')->insert([
    		'product_id' => 7,
    		"product_type_id" => 5,
    		"promotion_name" => "KM bánh valentine",
    		"percent" => 15,
    		"date_start" => "2017-04-20",
    		"date_end" => "2017-04-24"
    	]);
    }
}
