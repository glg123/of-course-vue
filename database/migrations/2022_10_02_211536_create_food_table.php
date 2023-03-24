<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->foreignId('unit_id')->nullable()->references('id')->on('units')->onDelete('cascade');
            $table->string('code')->unique()->index();
            $table->decimal('calory')->nullable();
            $table->decimal('serve')->default(100);
            $table->decimal('stock')->default(0);
            $table->decimal('stock_reminder')->nullable();
            $table->decimal('price')->nullable();
            $table->boolean('is_component')->default(false);
            $table->boolean('is_liked')->default(false);
            $table->json('variations')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('foods');
    }
}
