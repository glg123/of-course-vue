<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('reference_id')->nullable();
            $table->foreignId('referral_id')->nullable()->references('id')->on('referral_users')->onDelete('cascade');
            $table->foreignId('referral_user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('code')->nullable();
            $table->decimal('price')->nullable();
            $table->foreignId('package_id')->nullable()->references('id')->on('packages')->onDelete('cascade');
            $table->foreignId('varient_id')->nullable()->references('id')->on('package_varients')->onDelete('cascade');
            $table->foreignId('subscription_id')->nullable()->references('id')->on('user_subscriptions')->onDelete('cascade');
            $table->string('type')->nullable();
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
        Schema::dropIfExists('referral_transactions');
    }
}
