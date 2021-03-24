<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->date('birthdate')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->boolean('isVerified')->default(false);
            $table->string('google_id')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->integer('email_code')->nullable();
            $table->timestamp('email_verified_at', 0)->nullable();
            $table->text('password')->nullable();
            $table->rememberToken()->nullable();
            $table->float('coins', 8, 2)->nullable();
            $table->integer('refer_count')->nullable();
            $table->float('refer_earnings', 8, 2)->nullable();
            $table->integer('referred_by')->nullable();
            $table->boolean('is_subscribed')->default(false);
            $table->string('subscription_type')->nullable();
            $table->datetime('sub_start')->nullable();
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
        Schema::dropIfExists('users');
    }
}
