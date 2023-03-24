<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToReferralUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('referral_users', function (Blueprint $table) {
            $table->foreignId('referral_id')->nullable()->after('id')->references('id')->on('referrals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('referral_users', function (Blueprint $table) {
            if (app()->runningUnitTests()) {
                // Do nothing
                /** @see Blueprint::ensureCommandsAreValid */
            } else {
                $table->dropForeign(['referral_id']);
                $table->dropColumn('referral_id');
            }
        });
    }
}
