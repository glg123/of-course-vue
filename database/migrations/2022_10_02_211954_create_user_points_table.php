<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_points', function (Blueprint $table) {
            $table->id();
            $table->morphs('modelable');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('point');
            $table->boolean('active')->default(true);
            $table->string('type');
            $table->dateTime('expired_at');
            $table->foreignId('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('reveiw');
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
        Schema::dropIfExists('user_points');
    }
}
