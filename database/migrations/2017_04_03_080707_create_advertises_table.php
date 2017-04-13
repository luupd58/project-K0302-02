<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('advertise_name')->nullable()->default(null);
            $table->text('advertise_image');
            $table->text('advertise_link')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE advertises ADD FULLTEXT 
            advertise_name(advertise_name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertises');
    }
}
