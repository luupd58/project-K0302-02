<?php

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
    		'product_type_name' => "Bánh Sinh Nhật"
    	]);
    	DB::table('product_types')->insert([
    		'product_type_name' => "Bánh Hoa Quả"
    	]);
    	DB::table('product_types')->insert([
    		'product_type_name' => "Bánh Tiệc Mời"
    	]);
    	DB::table('product_types')->insert([
    		'product_type_name' => "Bánh Socola"
    	]);
    	DB::table('product_types')->insert([
    		'product_type_name' => "Bánh Valentine"
    	]);
        DB::table('product_types')->insert([
            'product_type_name' => "Bánh Đám Cưới"
        ]);
        DB::table('product_types')->insert([
            'product_type_name' => "Bánh Nhân Dâu"
        ]);
    }
}
