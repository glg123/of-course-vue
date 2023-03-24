<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('area_id')->nullable()->references('id')->on('locations')->onDelete('cascade');
            $table->foreignId('block_id')->nullable()->references('id')->on('locations')->onDelete('cascade');
            $table->string('time')->nullable();
            $table->string('map_lat')->nullable();
            $table->string('map_long')->nullable();
            $table->string('map_zoom')->nullable();
            $table->json('address')->nullable();
            $table->boolean('is_default')->default(false);
            $table->boolean('default_requested')->default(false);
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
        Schema::dropIfExists('addresses');
    }
}
