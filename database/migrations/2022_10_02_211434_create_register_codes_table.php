<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('via');
            $table->string('type')->default(1);
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('expired_at');
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
        Schema::dropIfExists('register_codes');
    }
}
