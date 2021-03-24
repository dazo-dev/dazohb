<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsracerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_racer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('er_id')->nullable();
            $table->date('er_date')->nullable();
            $table->integer('er_half')->nullable();
            $table->integer('er_fourth')->nullable();
            $table->integer('er_r34')->nullable();
            $table->integer('er_horse')->nullable();
            $table->integer('er_jockey')->nullable();
            $table->integer('er_trainer')->nullable();
            $table->integer('er_track')->nullable();
            $table->integer('er_course')->nullable();
            $table->integer('er_rc')->nullable();
            $table->integer('er_rtg')->nullable();
            $table->integer('er_draw')->nullable();
            $table->string('er_gear')->nullable();
            $table->integer('er_j_weight')->nullable();
            $table->integer('er_ja_weight')->nullable();
            $table->string('gate')->nullable();
            $table->integer('er_position')->nullable();
            $table->double('er_stake_won', 8, 2)->nullable();

            $table->string('er_lbw')->nullable();
            $table->integer('er_ha_weight')->nullable();
            $table->string('er_r_post')->nullable();
            $table->time('er_finishing_time')->nullable();
            $table->integer('er_season')->nullable();

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
        Schema::dropIfExists('events_racer');
    }
}



