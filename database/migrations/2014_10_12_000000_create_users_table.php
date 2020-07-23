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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('phone')->nullable();
            $table->string('usertype')->nullable();
            $table->string('password');
            $table->string('verification')->nullable();
            $table->string('reg_token')->nullable();
            $table->string('reg_type')->nullable();
            $table->string('access_token')->nullable();
            $table->integer('isActive')->nullable();
            $table->string('noOfAccountBought')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
