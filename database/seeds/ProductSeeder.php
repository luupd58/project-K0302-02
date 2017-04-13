<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('products')->insert([
    		'product_name' => "Bánh Sinh Nhật 11",
    		"price" => "100000",
    		"image" => "customer/images/products/1-1.jpg",
    		"quantity" => 2,
    		"product_type_id" => 1,
    		"total_buy"=> 100
    	]);

    	DB::table('products')->insert([
    		'product_name' => "Bánh Sinh Nhật 12",
    		"price" => "200000",
    		"image" => "customer/images/products/1-2.jpg",
    		"quantity" => 5,
    		"product_type_id" => 1,
    		"total_buy"=> 13
    	]);

    	DB::table('products')->insert([
    		'product_name' => "Bánh Sinh Nhật 13",
    		"price" => "250000",
    		"image" => "customer/images/products/1-3.jpg",
    		"quantity" => 2,
    		"product_type_id" => 1,
    		"total_buy"=> 54
    	]);

    	DB::table('products')->insert([
    		'product_name' => "Bánh Sinh Nhật 14",
    		"price" => "150000",
    		"image" => "customer/images/products/1-4.jpg",
    		"quantity" => 6,
    		"product_type_id" => 1,
    		"total_buy"=> 34
    	]);

    	DB::table('products')->insert([
    		'product_name' => "Bánh Sinh Nhật 15",
    		"price" => "160000",
    		"image" => "customer/images/products/1-5.jpg",
    		"quantity" => 3,
    		"product_type_id" => 1,
    		"total_buy"=> 32
    	]);

    	DB::table('products')->insert([
    		'product_name' => "Bánh Sinh Nhật 16",
    		"price" => "110000",
    		"image" => "customer/images/products/1-6.jpg",
    		"quantity" => 1,
    		"product_type_id" => 1,
    		"total_buy"=> 55
    	]);

    	DB::table('products')->insert([
    		'product_name' => "Bánh Sinh Nhật 17",
    		"price" => "130000",
    		"image" => "customer/images/products/1-7.jpg",
    		"quantity" => 6,
    		"product_type_id" => 1
    	]);




        DB::table('products')->insert([
            'product_name' => "Bánh Hoa Quả 11",
            "price" => "100000",
            "image" => "customer/images/products/2-1.jpg",
            "quantity" => 2,
            "product_type_id" => 2,
            "total_buy"=> 34
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Hoa Quả 12",
            "price" => "200000",
            "image" => "customer/images/products/2-2.jpg",
            "quantity" => 5,
            "product_type_id" => 2,
            "total_buy"=> 144
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Hoa Quả 13",
            "price" => "250000",
            "image" => "customer/images/products/2-3.jpg",
            "quantity" => 2,
            "product_type_id" => 2
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Hoa Quả 14",
            "price" => "150000",
            "image" => "customer/images/products/2-4.jpg",
            "quantity" => 6,
            "product_type_id" => 2
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Hoa Quả 15",
            "price" => "160000",
            "image" => "customer/images/products/2-5.jpg",
            "quantity" => 3,
            "product_type_id" => 2
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Hoa Quả 16",
            "price" => "110000",
            "image" => "customer/images/products/2-6.jpg",
            "quantity" => 7,
            "product_type_id" => 2
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Hoa Quả 17",
            "price" => "130000",
            "image" => "customer/images/products/2-7.jpg",
            "quantity" => 6,
            "product_type_id" => 2
        ]);




        DB::table('products')->insert([
            'product_name' => "Bánh Tiệc Mời 11",
            "price" => "100000",
            "image" => "customer/images/products/3-1.jpg",
            "quantity" => 2,
            "product_type_id" => 3
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Tiệc Mời 12",
            "price" => "200000",
            "image" => "customer/images/products/3-2.jpg",
            "quantity" => 5,
            "product_type_id" => 3
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Tiệc Mời 13",
            "price" => "250000",
            "image" => "customer/images/products/3-3.jpg",
            "quantity" => 2,
            "product_type_id" => 3
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Tiệc Mời 14",
            "price" => "150000",
            "image" => "customer/images/products/3-4.jpg",
            "quantity" => 6,
            "product_type_id" => 3
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Tiệc Mời 15",
            "price" => "160000",
            "image" => "customer/images/products/3-5.jpg",
            "quantity" => 3,
            "product_type_id" => 3
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Tiệc Mời 16",
            "price" => "110000",
            "image" => "customer/images/products/3-6.jpg",
            "quantity" => 7,
            "product_type_id" => 3
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Tiệc Mời 17",
            "price" => "130000",
            "image" => "customer/images/products/3-7.jpg",
            "quantity" => 6,
            "product_type_id" => 3
        ]);



        DB::table('products')->insert([
            'product_name' => "Bánh Socola 11",
            "price" => "100000",
            "image" => "customer/images/products/4-1.jpg",
            "quantity" => 2,
            "product_type_id" => 4
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Socola 12",
            "price" => "200000",
            "image" => "customer/images/products/4-2.jpg",
            "quantity" => 5,
            "product_type_id" => 4
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Socola 13",
            "price" => "250000",
            "image" => "customer/images/products/4-3.jpg",
            "quantity" => 2,
            "product_type_id" => 4
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Socola 14",
            "price" => "150000",
            "image" => "customer/images/products/4-4.jpg",
            "quantity" => 6,
            "product_type_id" => 4
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Socola 15",
            "price" => "160000",
            "image" => "customer/images/products/4-5.jpg",
            "quantity" => 3,
            "product_type_id" => 4
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Socola 16",
            "price" => "110000",
            "image" => "customer/images/products/4-6.jpg",
            "quantity" => 7,
            "product_type_id" => 4
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Socola 17",
            "price" => "130000",
            "image" => "customer/images/products/4-7.jpg",
            "quantity" => 6,
            "product_type_id" => 4
        ]);
    	


        DB::table('products')->insert([
            'product_name' => "Bánh Valentine 11",
            "price" => "100000",
            "image" => "customer/images/products/5-1.jpg",
            "quantity" => 2,
            "product_type_id" => 5
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Valentine 12",
            "price" => "200000",
            "image" => "customer/images/products/5-2.jpg",
            "quantity" => 5,
            "product_type_id" => 5
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Valentine 13",
            "price" => "250000",
            "image" => "customer/images/products/5-3.jpg",
            "quantity" => 2,
            "product_type_id" => 5
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Valentine 14",
            "price" => "150000",
            "image" => "customer/images/products/5-4.jpg",
            "quantity" => 6,
            "product_type_id" => 5
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Valentine 15",
            "price" => "160000",
            "image" => "customer/images/products/5-5.jpg",
            "quantity" => 3,
            "product_type_id" => 5
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Valentine 16",
            "price" => "110000",
            "image" => "customer/images/products/5-6.jpg",
            "quantity" => 7,
            "product_type_id" => 5
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Valentine 17",
            "price" => "130000",
            "image" => "customer/images/products/5-7.jpg",
            "quantity" => 6,
            "product_type_id" => 5
        ]);



        DB::table('products')->insert([
            'product_name' => "Bánh Đám Cưới 11",
            "price" => "100000",
            "image" => "customer/images/products/6-1.jpg",
            "quantity" => 2,
            "product_type_id" => 6
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Đám Cưới 12",
            "price" => "200000",
            "image" => "customer/images/products/6-2.jpg",
            "quantity" => 5,
            "product_type_id" => 6
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Đám Cưới 13",
            "price" => "250000",
            "image" => "customer/images/products/6-3.jpg",
            "quantity" => 2,
            "product_type_id" => 6
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Đám Cưới 14",
            "price" => "150000",
            "image" => "customer/images/products/6-4.jpg",
            "quantity" => 6,
            "product_type_id" => 6
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Đám Cưới 15",
            "price" => "160000",
            "image" => "customer/images/products/6-5.jpg",
            "quantity" => 3,
            "product_type_id" => 6
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Đám Cưới 16",
            "price" => "110000",
            "image" => "customer/images/products/6-6.jpg",
            "quantity" => 7,
            "product_type_id" => 6
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Đám Cưới 17",
            "price" => "130000",
            "image" => "customer/images/products/6-7.jpg",
            "quantity" => 6,
            "product_type_id" => 6
        ]);



        DB::table('products')->insert([
            'product_name' => "Bánh Nhân Dâu 11",
            "price" => "100000",
            "image" => "customer/images/products/7-1.jpg",
            "quantity" => 2,
            "product_type_id" => 7
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Nhân Dâu 12",
            "price" => "200000",
            "image" => "customer/images/products/7-2.jpg",
            "quantity" => 5,
            "product_type_id" => 7
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Nhân Dâu 13",
            "price" => "250000",
            "image" => "customer/images/products/7-3.jpg",
            "quantity" => 2,
            "product_type_id" => 7
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Nhân Dâu 14",
            "price" => "150000",
            "image" => "customer/images/products/7-4.jpg",
            "quantity" => 6,
            "product_type_id" => 7
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Nhân Dâu 15",
            "price" => "160000",
            "image" => "customer/images/products/7-5.jpg",
            "quantity" => 3,
            "product_type_id" => 7
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Nhân Dâu 16",
            "price" => "110000",
            "image" => "customer/images/products/7-6.jpg",
            "quantity" => 7,
            "product_type_id" => 7
        ]);

        DB::table('products')->insert([
            'product_name' => "Bánh Nhân Dâu 17",
            "price" => "130000",
            "image" => "customer/images/products/7-7.jpg",
            "quantity" => 6,
            "product_type_id" => 7
        ]);
    }
}
