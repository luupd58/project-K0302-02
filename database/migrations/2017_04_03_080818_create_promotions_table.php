<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->nullable()->default(null)->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('product_type_id')->nullable()->default(null)->unsigned();
            $table->foreign('product_type_id')->references('id') ->on('product_types');
            $table->string('promotion_name')->nullable()->default(null);
            $table->integer('percent');
            $table->date('date_start');
            $table->date('date_end');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE promotions ADD FULLTEXT 
            promotion_name(promotion_name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
