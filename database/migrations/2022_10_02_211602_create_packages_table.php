<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->integer('status')->nullable(0);
            $table->integer('show_order')->nullable();
            $table->boolean('is_celebrity')->default(false);
            $table->date('start_at')->nullable();
            $table->decimal('points')->nullable();
            $table->boolean('featured')->default(false);
            $table->decimal('price')->nullable();
            $table->string('image')->nullable();
            $table->json('variations')->nullable();
            $table->json('settings')->nullable();
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('packages');
    }
}
