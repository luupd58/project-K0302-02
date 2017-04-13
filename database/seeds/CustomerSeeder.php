<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
    		'customer_name' => "Tên customer số 1",
    		"username" => "custo1",
    		"password" => "12345",
    		"address" => "Địa chỉ số 1",
    		"phonenumber" => 1123123123,
    		"email" => "userso11@gmail.com"
    	]);
    	DB::table('customers')->insert([
    		'customer_name' => "Tên customer số 2",
    		"username" => "custo2",
    		"password" => "12345",
    		"address" => "Địa chỉ số 2",
    		"phonenumber" => 11231231,
    		"email" => "userso12@gmail.com"
    	]);
    	DB::table('customers')->insert([
    		'customer_name' => "Tên customer số 3",
    		"username" => "custo3",
    		"password" => "12345",
    		"address" => "Địa chỉ số 3",
    		"phonenumber" => 11231231,
    		"email" => "userso13@gmail.com"
    	]);
    	DB::table('customers')->insert([
    		'customer_name' => "Tên customer số 4",
    		"username" => "custo4",
    		"password" => "12345",
    		"address" => "Địa chỉ số 4",
    		"phonenumber" => 14234234,
    		"email" => "userso14@gmail.com"
    	]);
    	DB::table('customers')->insert([
    		'customer_name' => "Tên customer số 5",
    		"username" => "custo5",
    		"password" => "12345",
    		"address" => "Địa chỉ số 5",
    		"phonenumber" => 1234234,
    		"email" => "userso15@gmail.com"
    	]);
    	DB::table('customers')->insert([
    		'customer_name' => "Tên customer số 6",
    		"username" => "custo6",
    		"password" => "12345",
    		"address" => "Địa chỉ số 6",
    		"phonenumber" => 123121,
    		"email" => "userso16@gmail.com"
    	]);
    	DB::table('customers')->insert([
    		'customer_name' => "Tên customer số 7",
    		"username" => "custo7",
    		"password" => "12345",
    		"address" => "Địa chỉ số 7customer",
    		"phonenumber" => 112312,
    		"email" => "userso17@gmail.com"
    	]);
    }
}
