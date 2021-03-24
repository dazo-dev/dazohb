<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('horses_name')->nullable();
            $table->integer('horse_jockey', 0)->nullable();
            $table->string('horse_JRTE', 0)->nullable();
            $table->double('horse_weight', 8, 1)->nullable();
            $table->string('horses_owner')->nullable();
            $table->integer('horse_trainer', 0)->nullable();
            $table->string('horses_color')->nullable();
            $table->string('horses_sex')->nullable();
            $table->string('horses_origin')->nullable();
            $table->string('horses_imp_type')->nullable();
            $table->integer('horses_stake')->nullable();
            $table->string('horses_no_starts')->nullable();
            $table->integer('horses_cur_rating')->nullable();
            $table->integer('horses_pre_rating')->nullable();
            $table->string('horses_sire')->nullable();
            $table->string('horses_dam')->nullable();
            $table->string('horses_tracks')->nullable();
            $table->integer('horse_age', 0)->nullable();
            $table->string('horses_venue')->nullable();
            $table->string('horses_track')->nullable();
            $table->string('horses_best_time')->nullable();
            $table->integer('horse_pos', 0)->nullable();
            $table->integer('horse_halfq', 0)->nullable();
            $table->integer('horse_finq', 0)->nullable();
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
        Schema::dropIfExists('horses');
    }
}
