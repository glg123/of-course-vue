<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coaches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('coach_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->string('type');
            $table->decimal('price');
            $table->decimal('points');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->json('settings');
            $table->softDeletes();
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
        Schema::dropIfExists('user_coaches');
    }
}
