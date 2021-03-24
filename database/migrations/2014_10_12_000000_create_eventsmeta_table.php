<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsmetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meta_race_id')->nullable();
            $table->date('meta_race_date')->nullable();
            $table->string('meta_clocking')->nullable();
            $table->string('meta_length_finished')->nullable();
            $table->time('meta_total_time')->nullable();
            $table->double('meta_tri', 8, 2)->nullable();
            $table->double('meta_qrt', 8, 2)->nullable();
            $table->double('meta_penta', 8, 2)->nullable();
            $table->double('meta_f', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_meta');
    }
}



