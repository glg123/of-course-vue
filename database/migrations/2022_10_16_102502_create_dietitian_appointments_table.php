<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietitianAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dietitian_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('dietitian_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('discount')->nullable();
            $table->foreignId('copoun_id')->nullable()->references('id')->on('copouns')->onDelete('cascade');
            $table->string('payment_status')->default('pending');
            $table->string('payment_method')->nullable();
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
        Schema::dropIfExists('dietitian_appointments');
    }
}
