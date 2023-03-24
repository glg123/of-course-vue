<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->index()->unique();
            $table->string('phone')->index()->unique();
            $table->string('country_code')->nullable();
            $table->string('password');
            $table->date('birthday')->nullable();
            $table->string('how_find_us')->nullable();
            $table->string('communication')->nullable();
            $table->integer('by_employee')->nullable();
            $table->integer('goal')->nullable();
            $table->string('comment')->nullable();
            $table->string('time')->nullable();
            $table->string('image')->nullable();
            $table->json('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->boolean('active')->default(false);
            $table->string('status')->nullable();
            $table->json('settings')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
