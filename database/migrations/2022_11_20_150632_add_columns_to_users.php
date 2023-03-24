<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('referral_percent')->after('device_token')->nullable();
            $table->string('max_referral_amount')->after('device_token')->nullable();
            $table->decimal('commission_percent')->after('device_token')->nullable();
            $table->json('description')->after('commission_percent')->nullable();
            $table->string('celebirty_name')->after('commission_percent')->nullable();
            $table->integer('show_order')->after('id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('referral_percent');
            $table->dropColumn('max_referral_amount');
            $table->dropColumn('commission_percent');
            $table->dropColumn('description');
            $table->dropColumn('celebirty_name');
            $table->dropColumn('show_order');
        });
    }
}
