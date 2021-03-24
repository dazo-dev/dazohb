<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorsesMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horses_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('horse_id', 0)->nullable();
            $table->string('horses_venue')->nullable();
            $table->string('horses_track')->nullable();
            $table->string('horses_time')->nullable();
            $table->string('horses_fpos')->nullable();
            $table->string('horses_halfq')->nullable();
            $table->integer('horse_season', 0)->nullable();
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
        Schema::dropIfExists('horses_meta');
    }
}
