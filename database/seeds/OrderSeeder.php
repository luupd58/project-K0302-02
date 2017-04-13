<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
    		'customer_id' => 1,
    		"order_detail" => "trường order_detail",
    		"total_cost" => "400000",
    		"date_buy" => "2017-04-24 11:00:00",
    		"status" => 1,
    		"is_card" => 0,
    	]);
    	DB::table('orders')->insert([
    		'customer_id' => 3,
    		"order_detail" => "trường order_detail",
    		"total_cost" => "100000",
    		"date_buy" => "2017-04-24 11:00:00",
    		"status" => 0,
    		"is_card" => 1,
    		"card"=> "111111111"
    	]);
    	DB::table('orders')->insert([
    		'customer_id' => 2,
    		"order_detail" => "trường order_detail",
    		"total_cost" => "100000",
    		"date_buy" => "2017-04-24 11:00:00",
    		"status" => 1,
    		"is_card" => 1,
    		"card"=> "111111111"
    	]);
    	DB::table('orders')->insert([
    		'customer_id' => 1,
    		"order_detail" => "trường order_detail",
    		"total_cost" => "150000",
    		"date_buy" => "2017-04-24 11:00:00",
    		"status" => 0,
    		"is_card" => 1,
    		"card"=> "111111111"
    	]);
    	DB::table('orders')->insert([
    		'customer_id' => 1,
    		"order_detail" => "trường order_detail",
    		"total_cost" => "210000",
    		"date_buy" => "2017-04-24 11:00:00",
    		"status" => 1,
    		"is_card" => 0,
    	]);
    	DB::table('orders')->insert([
    		'customer_id' => 5,
    		"order_detail" => "trường order_detail",
    		"total_cost" => "410000",
    		"date_buy" => "2017-04-24 11:00:00",
    		"status" => 0,
    		"is_card" => 1,
    		"card"=> "111111111"
    	]);
    }
}
