<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJockeymetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jockeymeta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jockey_id', 0)->nullable();
            $table->string('meta_type')->nullable();
            $table->text('meta_details')->nullable();
            
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
        Schema::dropIfExists('jockeymeta');
    }
}
