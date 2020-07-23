<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Activities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->date('act_date')->nullable();
            $table->string('act_time')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('act_by')->nullable();
            $table->string('act_to')->nullable();
            $table->boolean('isComplete')->nullable()->default(false);
            $table->boolean('isReassigned')->nullable()->default(false);
            $table->string('weather')->nullable();
            $table->string('remark')->nullable();
            $table->string('elevation')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->mediumText('image')->nullable()->default('');
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
        //
    }
}
