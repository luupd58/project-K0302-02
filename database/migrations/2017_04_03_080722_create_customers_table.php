<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('address');
            $table->date('birthday')->nullable()->default(null);
            $table->string('phonenumber');
            $table->tinyInteger('sex')->nullable()->default(null);
            $table->string('email')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE customers ADD FULLTEXT 
            customer_name(customer_name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
