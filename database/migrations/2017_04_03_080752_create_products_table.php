<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name')->unique();
            $table->integer('price');
            $table->text('image');
            $table->text('description')->nullable()->default(null);
            $table->integer('quantity');
            $table->integer('product_type_id')->unsigned();
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->integer('like')->nullable()->default(null);
            $table->integer('dislike')->nullable()->default(null);
            $table->integer('total_buy')->nullable()->default(null);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE products ADD FULLTEXT 
            product_name(product_name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
