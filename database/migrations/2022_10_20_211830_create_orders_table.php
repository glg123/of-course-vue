<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('delivery_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('meal_id')->nullable()->references('id')->on('meals')->onDelete('cascade');
            $table->foreignId('package_varient_id')->nullable()->references('id')->on('package_varients')->onDelete('cascade');
            $table->foreignId('tag_id')->nullable()->references('id')->on('tags')->onDelete('cascade');
            $table->string('shift_time')->nullable();
            $table->string('tag')->nullable();
            $table->foreignId('user_subscription_id')->nullable()->references('id')->on('user_subscriptions')->onDelete('cascade');
            $table->string('status')->default('pending');
            $table->string('comment')->nullable();
            $table->decimal('delivery_cost')->default(0);
            $table->decimal('price')->default(0);
            $table->decimal('discount')->default(0);
            $table->decimal('total')->default(0);
            $table->dateTime('start_at')->nullable();
            $table->dateTime('delivery_at')->nullable();
            $table->string('type')->nullable();
            $table->foreignId('trainer_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->foreignId('area_id')->nullable()->references('id')->on('locations')->onDelete('cascade');
            $table->foreignId('block_id')->nullable()->references('id')->on('locations')->onDelete('cascade');
            $table->foreignId('zone_id')->nullable()->references('id')->on('zones')->onDelete('cascade');
            $table->json('address')->nullable();
            $table->json('days')->nullable();
            $table->json('meals')->nullable();
            $table->json('settings')->nullable();
            $table->json('variations')->nullable();
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
        Schema::dropIfExists('orders');
    }
}