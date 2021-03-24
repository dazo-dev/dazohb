<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJockeybioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jockey_bio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jockey_id', 0)->nullable();
            $table->string('jockey_nationality')->nullable();
            $table->integer('jockey_age')->nullable();
            $table->integer('jockey_sex')->nullable();
            $table->integer('jockey_started')->nullable();
            $table->integer('jockey_achievements')->nullable();
            $table->integer('jockey_n_wins')->nullable();
            $table->integer('jockey_total_race')->nullable();
            $table->integer('jockey_total_win')->nullable();
            $table->integer('jockey_season_played')->nullable();
            $table->text('jockey_bio')->nullable();
            $table->text('jockey_img_path')->nullable();
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
        Schema::dropIfExists('jockey_bio');
    }
}
