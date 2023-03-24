<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_food', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreignId('meal_id')->references('id')->on('meals')->onDelete('cascade');
            $table->boolean('is_like')->default(false);
            $table->string('qty_before')->default(100);
            $table->string('qty_after')->default(100);
            $table->json('settings')->nullable();
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
        Schema::dropIfExists('meal_food');
    }
}
