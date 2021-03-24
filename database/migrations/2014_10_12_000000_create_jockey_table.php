<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJockeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jockey', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jockey_name')->nullable();
            $table->integer('jockey_win', 0)->nullable();
            $table->integer('jockey_rides', 0)->nullable();
            $table->integer('jockey_won', 0)->nullable();
            $table->double('jockey_stake', 15, 2)->nullable();
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
        Schema::dropIfExists('jockey');
    }
}
