<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageSwitchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_switches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id_from')->nullable()->references('id')->on('packages')->onDelete('cascade');
            $table->foreignId('package_varient_id_from')->nullable()->references('id')->on('package_varients')->onDelete('cascade');
            $table->foreignId('package_id_to')->nullable()->references('id')->on('packages')->onDelete('cascade');
            $table->foreignId('package_varient_id_to')->nullable()->references('id')->on('package_varients')->onDelete('cascade');
            $table->integer('status')->default(0);
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->json('settings')->nullable();
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
        Schema::dropIfExists('package_switches');
    }
}
