<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->morphs('modelable');
            $table->string('invoice_id')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('qty')->nullable();
            $table->string('supplier_name')->nullable();
            $table->decimal('discount_value')->nullable();
            $table->decimal('total')->nullable();
            $table->decimal('tax')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->foreignId('copoun_id')->nullable()->references('id')->on('copouns')->onDelete('cascade');
            $table->foreignId('coach_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('delivery_id')->nullable()->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('invoices');
    }
}