<?php

use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address')->insert([
    		'address' => "Số 3, Duy Tân, Cầu Giấy, Hà Nội",
    	]);
    }
}
