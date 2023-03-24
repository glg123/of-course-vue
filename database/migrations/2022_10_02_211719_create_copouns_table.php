<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopounsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copouns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('code')->unique();
            $table->boolean('status')->default(0);
            $table->decimal('discount')->default(0);
            $table->string('discount_type')->default('amount');
            $table->integer('max_use')->nullable();
            $table->integer('used')->nullable();
            $table->date('start_at');
            $table->date('end_at');
            $table->decimal('min_order_total')->nullable();
            $table->json('packages')->nullable();
            $table->json('package_varients')->nullable();
            $table->json('settings')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('copouns');
    }
}
