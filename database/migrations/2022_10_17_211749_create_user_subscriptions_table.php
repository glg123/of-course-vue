<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('package_id')->nullable()->references('id')->on('packages')->onDelete('cascade');
            $table->foreignId('package_varient_id')->nullable()->references('id')->on('package_varients')->onDelete('cascade');
            $table->foreignId('copoun_id')->nullable()->references('id')->on('copouns')->onDelete('cascade');
            $table->foreignId('offer_id')->nullable()->references('id')->on('offers')->onDelete('cascade');
            $table->string('referral_code')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->decimal('price')->nullable();
            $table->decimal('discount')->nullable();
            $table->integer('qty')->default(1);
            $table->decimal('total')->nullable();
            $table->boolean('active')->default(true);
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->string('type')->nullable();
            $table->foreignId('trainer_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->json('payments')->nullable();
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
        Schema::dropIfExists('user_subscriptions');
    }
}
