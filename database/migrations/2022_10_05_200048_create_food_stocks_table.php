<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->string('reference')->nullable();
            $table->string('status')->default(0);
            $table->decimal('stock')->nullable();
            $table->decimal('returned')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('type')->nullable();
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
        Schema::dropIfExists('food_stocks');
    }
}
