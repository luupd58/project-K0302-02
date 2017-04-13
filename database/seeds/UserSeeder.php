<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
    		'user_name' => "Tên user số 1",
    		"username" => "user100",
    		"password" => bcrypt("123456"),
    		"level" => 1,
    		"email" => "userso1@gmail.com"
    	]);
    	DB::table('users')->insert([
    		'user_name' => "Tên user số 2",
    		"username" => "user2",
    		"password" => bcrypt("123456"),
    		"level" => 1,
    		"email" => "userso2@gmail.com"
    	]);
    	DB::table('users')->insert([
    		'user_name' => "Tên user số 3",
    		"username" => "user3",
    		"password" => bcrypt("123456"),
    		"level" => 1,
    		"email" => "userso3@gmail.com"
    	]);
    	DB::table('users')->insert([
    		'user_name' => "Tên user số 4",
    		"username" => "user4",
    		"password" => bcrypt("123456"),
    		"level" => 1,
    		"email" => "userso4@gmail.com"
    	]);
    	DB::table('users')->insert([
    		'user_name' => "Tên user số 5",
    		"username" => "user5",
    		"password" => bcrypt("123456"),
    		"level" => 1,
    		"email" => "userso5@gmail.com"
    	]);
    	DB::table('users')->insert([
    		'user_name' => "Tên user số 6",
    		"username" => "user6",
    		"password" => bcrypt("123456"),
    		"level" => 1,
    		"email" => "userso6@gmail.com"
    	]);
    	DB::table('users')->insert([
    		'user_name' => "Tên user số 7",
    		"username" => "user7",
    		"password" => bcrypt("123456"),
    		"level" => 1,
    		"email" => "userso7@gmail.com"
    	]);
    	DB::table('users')->insert([
    		'user_name' => "Tên user số 8",
    		"username" => "user8",
    		"password" => bcrypt("123456"),
    		"level" => 1,
    		"email" => "userso8@gmail.com"
    	]);
    	DB::table('users')->insert([
    		'user_name' => "Tên user số 9",
    		"username" => "user9",
    		"password" => bcrypt("123456"),
    		"level" => 1,
    		"email" => "userso9@gmail.com"
    	]);
        DB::table('users')->insert([
            'user_name' => "Tên Admin",
            "username" => "admin1",
            "password" => bcrypt("123456"),
            "level" => 0,
            "email" => "useradmin@gmail.com"
        ]);
    }
}
