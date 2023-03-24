<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->string('reference_id');
            $table->string('name');
            $table->string('additional_days')->nullable();
            $table->string('bonus')->nullable();
            $table->boolean('active')->default(true);
            $table->string('image')->nullable();
            $table->boolean('all_package')->default(0);
            $table->json('packages')->nullable();
            $table->json('package_varients')->nullable();
            $table->json('variations')->nullable();
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
        Schema::dropIfExists('referrals');
    }
}
