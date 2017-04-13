<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name');
            $table->string('username')->unique();
            $table->string('password');
            $table->tinyInteger('level')->default(1);
            $table->string('email')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE users ADD FULLTEXT user_name(user_name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
