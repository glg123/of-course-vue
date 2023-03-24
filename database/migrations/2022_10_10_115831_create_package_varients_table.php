<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageVarientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_varients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->integer('days_available')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('avg_price')->nullable();
            $table->json('days')->nullable();
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
        Schema::dropIfExists('package_varients');
    }
}
