<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->nullable()->references('id')->on('packages')->onDelete('cascade');
            $table->foreignId('meal_category_id')->nullable()->references('id')->on('meal_categories')->onDelete('cascade');
            $table->json('days')->nullable();
            $table->json('variations')->nullable();
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
        Schema::dropIfExists('package_meals');
    }
}
