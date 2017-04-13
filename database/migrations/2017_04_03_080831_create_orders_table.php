<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->nullable()
                ->default(null);
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->text('order_detail')->nullable()->default(null);
            $table->integer('total_cost');
            $table->dateTime('date_buy');
            $table->dateTime('date_transfer')->nullable()->default(null);
            $table->tinyInteger('status')->default(0);
            $table->text('name_customer')->nullable()->default(null);
            $table->text('phonenumber')->nullable()->default(null);
            $table->text('address')->nullable()->default(null);
            $table->tinyInteger('is_card')->default(0);
            $table->text('card')->nullable()->default(null);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE orders ADD FULLTEXT 
            name_customer(name_customer)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
